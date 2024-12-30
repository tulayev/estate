<?php

namespace App\Helpers;

class ImagePathResolver
{
    public static function resolve(string | null $imagePath): string
    {
        if (!$imagePath === null)
            return '';

        return asset('storage/' . $imagePath);
    }
}
