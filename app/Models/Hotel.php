<?php

namespace App\Models;

use App\Helpers\Constants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'codename',
        'category',
        'latitude',
        'longitude',
        'price',
        'main_image',
        'gallery',
        'active',
        'created_by',
    ];

    protected $casts = [
        'gallery' => 'array', // Automatically handle JSON
        'latitude' => 'float',
        'longitude' => 'float',
    ];

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
}
