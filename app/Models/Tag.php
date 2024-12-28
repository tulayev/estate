<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Tag extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
    ];

    protected $translatable = [
        'name',
    ];

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class, 'hotel_tag');
    }
}
