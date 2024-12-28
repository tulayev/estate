<?php

namespace App\Helpers;

class ImagePathResolver
{
    public static function resolve(string $imagePath): string
    {
        return asset('storage/' . $imagePath);
    }
}
