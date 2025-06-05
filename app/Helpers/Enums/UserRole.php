<?php

namespace App\Helpers\Enums;

enum UserRole: int
{
    case Admin = 1;
    case Moderator = 2;
    case Developer = 3;
}
