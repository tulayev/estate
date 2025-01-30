<?php

namespace App\Helpers;

class Helper
{
    public static function splitString($value, $separator = ','): array | null
    {
        if ($value) {
            return explode($separator, $value);
        }

        return  null;
    }
}
