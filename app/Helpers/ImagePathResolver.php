<?php

namespace App\Helpers;

class ImagePathResolver
{
    public static function resolve(string | null $imagePath): string | null
    {
        if ($imagePath === null)
            return null;

        return asset('storage/' . $imagePath);
    }
}
