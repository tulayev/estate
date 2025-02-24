<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Translatable\HasTranslations;

class Location extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'location',
        'description',
        'description_ru',
        'longitude',
        'latitude',
    ];

    protected $translatable = [
        'location'
    ];

    public function hotels(): BelongsToMany
    {
        return $this->belongsToMany(Hotel::class, 'hotel_location');
    }
}
