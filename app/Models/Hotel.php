<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'price', 'main_image', 'gallery'];

    protected $casts = [
        'gallery' => 'array', // Automatically handle JSON
    ];
}
