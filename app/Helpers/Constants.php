<?php

namespace App\Helpers;

use App\Helpers\Enums\UserRole;

class Constants
{
    public const HOTELS_UPLOAD_PATH = 'upload/images/hotels';

    public const TOPICS_UPLOAD_PATH = 'upload/images/topics';

    public const PUBLIC_DISK = 'public';

    public const SYSTEM_TYPE_IDS = [
        'rent' => 1,
        'primary' => 3,
        'resales' => 6,
    ];

    public const SYSTEM_TAG_IDS = [
        'land' => 6,
    ];

    public const SELECTABLE_CURRENCIES = [
        'TH' => 'THB',
        'US' => 'USD',
        'RU' => 'RUB',
    ];

    public static function getRoles(): array
    {
        return [
            UserRole::Admin->name,
            UserRole::Moderator->name,
            UserRole::Developer->name,
        ];
    }
}
