<?php

namespace App\Models;

use App\Helpers\Enums\TopicType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Topic extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'main_ideas',
        'minutes_to_read',
        'views',
        'image',
        'logo',
        'active',
        'type',
        'topic_category_id',
        'created_by',
    ];

    protected $translatable = [
        'title',
        'body',
        'main_ideas',
    ];

    protected $casts = [
        'type' => TopicType::class,
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('active', true);
    }

    public function scopeByType(Builder $query, TopicType $topicType): Builder
    {
        return $query->where('type', $topicType->value);
    }

    public function scopeByCategory(Builder $query, $categories): Builder
    {
        if (!empty($categories)) {
            $categoriesArray = explode(',', $categories);

            $query->whereIn('topic_category_id', $categoriesArray);
        }
        return $query;
    }

    public function scopeSearchByTitle(Builder $query, $searchTerm): Builder
    {
        $locale = app()->getLocale();

        if (!empty($searchTerm)) {
            $query->whereRaw(
                "LOWER(JSON_UNQUOTE(JSON_EXTRACT(title, '$.\"{$locale}\"'))) LIKE ?",
                ['%' . strtolower($searchTerm) . '%']
            );
        }

        return $query;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(TopicCategory::class, 'topic_category_id');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(TopicLike::class);
    }

    public function getIsLikedAttribute(): bool
    {
        $userId = auth()->id();
        $ipAddress = request()->getClientIp();

        return $this->likes()
            ->when($userId, function ($query) use ($userId) {
                $query->where('liked_by', $userId);
            })
            ->when(!$userId, function ($query) use ($ipAddress) {
                $query->where('ip_address', $ipAddress);
            })
            ->exists();
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($topic) {
            $topic->created_by = auth()->user()->id;
            $topic->minutes_to_read = $topic->calculateMinutesToRead();
        });
    }

    private function calculateMinutesToRead(): int
    {
        $wordCount = str_word_count(strip_tags($this->body));
        $wordsPerMinute = 200;

        return ceil($wordCount / $wordsPerMinute);
    }
}
