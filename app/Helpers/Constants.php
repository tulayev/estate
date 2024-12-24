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

    public const IDENTICAL_COLOR_PAGES = [
        'home',
    ];
}
