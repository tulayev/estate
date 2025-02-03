<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class TopicCategory extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
    ];

    protected $translatable = [
        'title',
    ];

    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);
    }
}
