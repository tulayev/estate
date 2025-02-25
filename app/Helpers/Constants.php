<?php

namespace App\Helpers;

class Constants
{
    public const UPLOAD_PATH = 'upload/images';

    public const PUBLIC_DISK = 'public';

    public const ROLES = [
        'Admin' => 1,
        'Moderator' => 2,
        'Developer' => 3,
    ];

    public const SYSTEM_TYPE_IDS = [
        'rent' => 1,
        'primary' => 3,
        'resales' => 6,
    ];

    public const SYSTEM_TAG_IDS = [
        'land' => 6,
    ];
}
