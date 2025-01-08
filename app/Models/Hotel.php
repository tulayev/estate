<?php

namespace App\Models;

use App\Helpers\Constants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        'active',
        'created_by',
    ];

    protected $translatable = [
        'description',
    ];

    protected $casts = [
        'gallery' => 'array', // Automatically handle JSON
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function scopeSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where('title', 'LIKE', '%' . $keyword . '%')
                ->orWhere('type', 'LIKE', '%' . $keyword . '%');
        }
        return $query;
    }

    public function scopeFilterByPrice($query, $min = null, $max = null)
    {
        if ($min !== null) {
            $query->where('price', '>=', $min);
        }
        if ($max !== null) {
            $query->where('price', '<=', $max);
        }
        return $query;
    }

    public function scopeFilterByBedrooms($query, $min = null, $max = null)
    {
        if ($min !== null) {
            $query->where(function ($q) use ($min) {
                $q->whereRaw(
                    '(SELECT SUM(bedrooms) FROM floors WHERE floors.hotel_id = hotels.id) >= ?',
                    [$min]
                );
            });
        }

        if ($max !== null) {
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
        if ($min !== null) {
            $query->where(function ($q) use ($min) {
                $q->whereRaw(
                    '(SELECT SUM(bathrooms) FROM floors WHERE floors.hotel_id = hotels.id) >= ?',
                    [$min]
                );
            });
        }

        if ($max !== null) {
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

    protected static function boot()
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

    public function author()
    {
        return $this->belongsTo(MoonshineUser::class, 'created_by');
    }

    public function floors()
    {
        return $this->hasMany(Floor::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'hotel_tag');
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'hotel_feature');
    }

    public function types()
    {
        return $this->belongsToMany(Type::class, 'hotel_type');
    }

    public function likes()
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

    public function getFormattedAreaAttribute()
    {
        return number_format($this->area, 2);
    }

    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 3);
    }
}
