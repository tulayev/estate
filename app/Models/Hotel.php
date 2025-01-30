<?php

namespace App\Models;

use App\Helpers\Constants;
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
        'location',
        'latitude',
        'longitude',
        'price',
        'main_image',
        'gallery',
        'main_image_old',
        'gallery_old',
        'active',
        'created_by',
    ];

    protected $translatable = [
        'description',
        'location',
    ];

    protected $casts = [
        'gallery' => 'array',
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function scopeLocations($query)
    {
        return $query->select('location', 'longitude', 'latitude')->distinct();
    }

    public function scopeSearchByTitle($query, $keyword)
    {
        if ($keyword) {
            $query->whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($keyword) . '%']);
        }

        return $query;
    }

    public function scopeSearchByLocations($query, $searchTerm)
    {
        $locale = app()->getLocale();

        if ($searchTerm) {
            $query->whereRaw(
                "LOWER(JSON_UNQUOTE(JSON_EXTRACT(location, '$.\"{$locale}\"'))) LIKE ?",
                ['%' . strtolower($searchTerm) . '%']
            );
        }

        return $query;
    }

    public function scopeFilterByPrice($query, $min = null, $max = null)
    {
        if ($min !== null && $min != 0) {
            $query->where('price', '>=', $min);
        }
        if ($max !== null && $max != 0) {
            $query->where('price', '<=', $max);
        }

        return $query;
    }

    public function scopeFilterByBedrooms($query, $min = null, $max = null)
    {
        if ($min !== null && $min != 0) {
            $query->where(function ($q) use ($min) {
                $q->whereRaw(
                    '(SELECT SUM(bedrooms) FROM floors WHERE floors.hotel_id = hotels.id) >= ?',
                    [$min]
                );
            });
        }

        if ($max !== null && $max != 0) {
            $query->where(function ($q) use ($max) {
                $q->whereRaw(
                    '(SELECT SUM(bedrooms) FROM floors WHERE floors.hotel_id = hotels.id) <= ?',
                    [$max]
                );
            });
        }

        return $query;
    }

    public function scopeFilterByBathrooms($query, $min = null, $max = null)
    {
        if ($min !== null && $min != 0) {
            $query->where(function ($q) use ($min) {
                $q->whereRaw(
                    '(SELECT SUM(bathrooms) FROM floors WHERE floors.hotel_id = hotels.id) >= ?',
                    [$min]
                );
            });
        }

        if ($max !== null && $max != 0) {
            $query->where(function ($q) use ($max) {
                $q->whereRaw(
                    '(SELECT SUM(bathrooms) FROM floors WHERE floors.hotel_id = hotels.id) <= ?',
                    [$max]
                );
            });
        }

        return $query;
    }

    public function scopeFilterByTypes($query, $types)
    {
        if (!empty($types)) {
            $typesArray = explode(',', $types);

            $query->whereHas('types', function ($q) use ($typesArray) {
                $q->whereIn('types.id', $typesArray); // Specify `types.id`
            });
        }
        return $query;
    }

    public function scopeFilterByTags($query, $tags)
    {
        if (!empty($tags)) {
            $tagsArray = explode(',', $tags);

            $query->whereHas('tags', function ($q) use ($tagsArray) {
                $q->whereIn('tags.id', $tagsArray); // Specify `tags.id`
            });
        }
        return $query;
    }

    public function scopeFilterByFeatures($query, $features)
    {
        if (!empty($features)) {
            $featuresArray = explode(',', $features);

            $query->whereHas('features', function ($q) use ($featuresArray) {
                $q->whereIn('features.id', $featuresArray); // Specify `features.id`
            });
        }
        return $query;
    }

    public function scopeFilterByLocations($query, $locations)
    {
        $locale = app()->getLocale();

        if (!empty($locations)) {
            $locationArray = explode(',', $locations);

            foreach ($locationArray as $location) {
                $location = trim($location);

                $query->orWhereRaw(
                    "LOWER(JSON_UNQUOTE(JSON_EXTRACT(location, '$.\"{$locale}\"'))) LIKE ?",
                    ['%' . strtolower($location) . '%']
                );
            }
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

    public function likes(): HasMany
    {
        return $this->hasMany(HotelLike::class);
    }

    public function getAreaAttribute()
    {
        return $this->floors()->sum('area');
    }

    public function getBedroomsAttribute()
    {
        return $this->floors()->sum('bedrooms');
    }

    public function getBathroomsAttribute()
    {
        return $this->floors()->sum('bathrooms');
    }

    public function getFormattedAreaAttribute(): string
    {
        return number_format($this->area, 2);
    }

    public function getFormattedPriceAttribute(): string
    {
        return number_format($this->price, 3);
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
