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
        'name',
        'description',
        'longitude',
        'latitude',
    ];

    protected $translatable = [
        'name',
        'description',
    ];

    public function hotels(): BelongsToMany
    {
        return $this->belongsToMany(Hotel::class, 'hotel_location');
    }
}
