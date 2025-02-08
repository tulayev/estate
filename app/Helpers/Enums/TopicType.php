<?php

namespace App\Helpers\Enums;

use Illuminate\Support\Facades\Lang;

enum TopicType: string
{
    case FOR_INVESTORS = 'for_investors';
    case FOR_DEVELOPERS = 'for_developers';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function label(): string
    {
        return Lang::get('general.topic_types.' . $this->value);
    }
}
