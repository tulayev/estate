<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
