<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use MoonShine\Models\MoonshineUser;
use Spatie\Translatable\HasTranslations;

class Hotel extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'physical_address',
        'codename',
        'location',
        'location_description',
        'latitude',
        'longitude',
        'price',
        'main_image',
        'gallery',
        'main_image_url',
        'gallery_url',
        'active',
        'ie_verified',
        'ie_score',
        'created_by',
        'topic_id',
    ];

    protected $translatable = [
        'description',
        'physical_address',
        'location',
        'location_description',
    ];

    protected $casts = [
        'gallery' => 'array',
        'location' => 'array',
        'location_description' => 'array',
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('active', true);
    }

    public function scopeIeVerified(Builder $query): Builder
    {
        return $query->where('ie_verified', true);
    }

    public function contacts(): BelongsToMany
    {
        return $this->belongsToMany(Contact::class, 'hotel_contact');
    }

    public function scopeFullSearch(Builder $query, $keyword): Builder
    {
        // Split input by multiple possible separators: comma, space, semicolon, or pipe (|)
        $keywords = preg_split('/[\s,;|]+/', $keyword, -1, PREG_SPLIT_NO_EMPTY);
        $locale = app()->getLocale();

        if (empty($keywords)) {
            return $query;
        }

        return $query->select('hotels.*')
            ->leftJoin('hotel_tag', 'hotel_tag.hotel_id', '=', 'hotels.id')
            ->leftJoin('tags', 'tags.id', '=', 'hotel_tag.tag_id')
            ->leftJoin('hotel_type', 'hotel_type.hotel_id', '=', 'hotels.id')
            ->leftJoin('types', 'types.id', '=', 'hotel_type.type_id')
            ->leftJoin('hotel_feature', 'hotel_feature.hotel_id', '=', 'hotels.id')
            ->leftJoin('features', 'features.id', '=', 'hotel_feature.feature_id')
            ->leftJoin('hotel_location', 'hotel_location.hotel_id', '=', 'hotels.id')
            ->leftJoin('locations', 'locations.id', '=', 'hotel_location.location_id')
            ->where(function ($q) use ($keywords, $locale) {
                foreach ($keywords as $word) {
                    $word = strtolower(trim($word));

                    $q->where(function ($subQuery) use ($word, $locale) {
                        // 1. Search by full match (LIKE)
                        $subQuery->whereRaw("LOWER(hotels.title) LIKE LOWER(?)", ["%{$word}%"])
                            ->orWhereRaw("SOUNDEX(LOWER(hotels.title)) = SOUNDEX(LOWER(?))", [$word])
                            ->orWhereRaw("LOWER(JSON_UNQUOTE(JSON_EXTRACT(tags.name, '$.$locale'))) LIKE LOWER(?)", ["%{$word}%"])
                            ->orWhereRaw("LOWER(JSON_UNQUOTE(JSON_EXTRACT(types.name, '$.$locale'))) LIKE LOWER(?)", ["%{$word}%"])
                            ->orWhereRaw("LOWER(JSON_UNQUOTE(JSON_EXTRACT(features.name, '$.$locale'))) LIKE LOWER(?)", ["%{$word}%"])
                            ->orWhereRaw("LOWER(JSON_UNQUOTE(JSON_EXTRACT(locations.name, '$.$locale'))) LIKE LOWER(?)", ["%{$word}%"])
                            // 2. Search by SOUNDEX (typos)
                            ->orWhereRaw("SOUNDEX(LOWER(JSON_UNQUOTE(JSON_EXTRACT(tags.name, '$.$locale')))) = SOUNDEX(LOWER(?))", [$word])
                            ->orWhereRaw("SOUNDEX(LOWER(JSON_UNQUOTE(JSON_EXTRACT(types.name, '$.$locale')))) = SOUNDEX(LOWER(?))", [$word])
                            ->orWhereRaw("SOUNDEX(LOWER(JSON_UNQUOTE(JSON_EXTRACT(features.name, '$.$locale')))) = SOUNDEX(LOWER(?))", [$word])
                            ->orWhereRaw("SOUNDEX(LOWER(JSON_UNQUOTE(JSON_EXTRACT(locations.name, '$.$locale')))) = SOUNDEX(LOWER(?))", [$word]);
                    });
                }
            })
            ->distinct();
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(MoonshineUser::class, 'created_by');
    }

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }

    public function floors(): HasMany
    {
        return $this->hasMany(Floor::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'hotel_tag');
    }

    public function features(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class, 'hotel_feature');
    }

    public function types(): BelongsToMany
    {
        return $this->belongsToMany(Type::class, 'hotel_type');
    }

    public function locations(): BelongsToMany
    {
        return $this->belongsToMany(Location::class, 'hotel_location');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(HotelLike::class);
    }

    public function getAreaAttribute(): float
    {
        return $this->floors()->sum('area');
    }

    public function getBedroomsAttribute(): int
    {
        return $this->floors()->sum('bedrooms');
    }

    public function getBathroomsAttribute(): int
    {
        return $this->floors()->sum('bathrooms');
    }

    public function getFormattedAreaAttribute(): string
    {
        return number_format($this->area, 2);
    }

    public function getFloorWithMinimumBedroomsAttribute(): ?Floor
    {
        return $this->floors
            ->reject(fn ($floor) => $floor->bedrooms == 0 && $floor->bathrooms == 0)
            ->sortBy('bedrooms')
            ->first();
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

    public static function getMaxPrice(): int
    {
        return ceil(self::max('price'));
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($hotel) {
            $hotel->created_by = auth()->user()->id;
        });
    }
}
