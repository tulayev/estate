<?php

namespace App\Models;

use App\Helpers\Constants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Floor extends Model
{
    use HasFactory;

    protected $fillable = [
        'floor',
        'image',
        'image_url',
        'bedrooms',
        'bathrooms',
        'area',
        'hotel_id',
        'price',
    ];

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }

    public function getFormattedAreaAttribute(): string
    {
        return number_format($this->area, 2);
    }

    public function getPriceAttribute($value): string
    {
        return number_format($value, 2, '.', ',');
    }

    protected static function boot(): void
    {
        parent::boot();

        static::deleting(function ($floor) {
            if (!is_null($floor->image) && Storage::disk(Constants::PUBLIC_DISK)->exists($floor->image)) {
                Storage::disk(Constants::PUBLIC_DISK)->delete($floor->image);
            }
        });
    }
}
