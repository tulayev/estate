<?php

namespace App\Helpers;

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
}
