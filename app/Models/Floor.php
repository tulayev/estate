<?php

namespace App\Models;

use App\Helpers\Constants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Floor extends Model
{
    use HasFactory;

    protected $fillable = [
        'floor',
        'image',
        'bedrooms',
        'bathrooms',
        'area',
        'hotel_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($floor) {
            if (!is_null($floor->image) && Storage::disk(Constants::PUBLIC_DISK)->exists($floor->image)) {
                Storage::disk(Constants::PUBLIC_DISK)->delete($floor->image);
            }
        });
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function getFormattedAreaAttribute()
    {
        return number_format($this->area, 2);
    }
}
