<?php

namespace App\Models;

use App\Helpers\Constants;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use MoonShine\Models\MoonshineUser;
use Spatie\Translatable\HasTranslations;

class Hotel extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'codename',
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
    ];

    protected $translatable = [
        'description',
    ];

    protected $casts = [
        'gallery' => 'array',
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

    public function scopeFilterByPrice(Builder $query, $min = null, $max = null): Builder
    {
        if (!empty($min)) {
            $query->where('price', '>=', $min);
        }
        if (!empty($max)) {
            $query->where('price', '<=', $max);
        }

        return $query;
    }

    public function scopeFilterByBedrooms(Builder $query, $min = null, $max = null): Builder
    {
        if (!empty($min)) {
            $query->where(function ($q) use ($min) {
                $q->whereRaw(
                    '(SELECT MIN(floors.bedrooms) FROM floors WHERE floors.hotel_id = hotels.id GROUP BY floors.hotel_id) >= ?',
                    [$min]
                );
            });
        }

        if (!empty($max)) {
            $query->where(function ($q) use ($max) {
                $q->whereRaw(
                    '(SELECT MAX(floors.bedrooms) FROM floors WHERE floors.hotel_id = hotels.id GROUP BY floors.hotel_id) <= ?',
                    [$max]
                );
            });
        }

        return $query;
    }

    public function scopeFilterByBathrooms(Builder $query, $min = null, $max = null): Builder
    {
        if (!empty($min)) {
            $query->where(function ($q) use ($min) {
                $q->whereRaw(
                    '(SELECT MIN(floors.bathrooms) FROM floors WHERE floors.hotel_id = hotels.id GROUP BY floors.hotel_id) >= ?',
                    [$min]
                );
            });
        }

        if (!empty($max)) {
            $query->where(function ($q) use ($max) {
                $q->whereRaw(
                    '(SELECT MAX(floors.bathrooms) FROM floors WHERE floors.hotel_id = hotels.id GROUP BY floors.hotel_id) <= ?',
                    [$max]
                );
            });
        }

        return $query;
    }

    public function scopeFilterByTypes(Builder $query, $types): Builder
    {
        if (!empty($types)) {
            $typesArray = explode(',', $types);

            $query->whereHas('types', function ($q) use ($typesArray) {
                $q->whereIn('types.id', $typesArray);
            });
        }
        return $query;
    }

    public function scopeFilterByTags(Builder $query, $tags): Builder
    {
        if (!empty($tags)) {
            $tagsArray = explode(',', $tags);

            $query->whereHas('tags', function ($q) use ($tagsArray) {
                $q->whereIn('tags.id', $tagsArray);
            });
        }
        return $query;
    }

    public function scopeFilterByLocations(Builder $query, $locations): Builder
    {
        if (!empty($locations)) {
            $locationsArray = explode(',', $locations);

            $query->whereHas('locations', function ($q) use ($locationsArray) {
                $q->whereIn('locations.id', $locationsArray);
            });
        }
        return $query;
    }

    public function scopeFilterByFeatures(Builder $query, $features): Builder
    {
        if (!empty($features)) {
            $featuresArray = explode(',', $features);

            $query->whereHas('features', function ($q) use ($featuresArray) {
                $q->whereIn('features.id', $featuresArray);
            });
        }
        return $query;
    }


    public function author(): BelongsTo
    {
        return $this->belongsTo(MoonshineUser::class, 'created_by');
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

    public function getFormattedPriceAttribute(): string
    {
        return number_format($this->price, 2, '.', ',');
    }

    public function getIsLikedAttribute(): bool
    {
        $userId = auth()->id();
        $ipAddress = request()->ip();

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

        static::deleting(function ($hotel) {
            if (!is_null($hotel->main_image) && Storage::disk(Constants::PUBLIC_DISK)->exists($hotel->main_image)) {
                Storage::disk(Constants::PUBLIC_DISK)->delete($hotel->main_image);
            }

            if (is_array($hotel->gallery)) {
                foreach ($hotel->gallery as $image) {
                    if (!is_null($image) && Storage::disk(Constants::PUBLIC_DISK)->exists($image)) {
                        Storage::disk(Constants::PUBLIC_DISK)->delete($image);
                    }
                }
            }

            if ($hotel->floors) {
                foreach ($hotel->floors as $floor) {
                    if (!is_null($floor->image) && Storage::disk(Constants::PUBLIC_DISK)->exists($floor->image)) {
                        Storage::disk(Constants::PUBLIC_DISK)->delete($floor->image);
                    }
                }
            }
        });
    }
}
