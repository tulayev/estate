<?php

namespace App\Models;

use App\Helpers\Constants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;

class Topic extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'image',
        'active',
        'topic_category_id',
        'created_by',
    ];

    protected $translatable = [
        'title',
        'body',
    ];

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($topic) {
            $topic->created_by = auth()->user()->id;
        });

        static::deleting(function ($topic) {
            if (!is_null($topic->image) && Storage::disk(Constants::PUBLIC_DISK)->exists($topic->image)) {
                Storage::disk(Constants::PUBLIC_DISK)->delete($topic->image);
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(TopicCategory::class, 'topic_category_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
