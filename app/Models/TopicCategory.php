<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
}
