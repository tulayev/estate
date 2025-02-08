<?php

namespace App\Helpers\Enums;

enum TopicType: string
{
    case FOR_INVESTORS = 'for_investors';
    case FOR_DEVELOPERS = 'for_developers';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
