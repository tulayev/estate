<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
}
