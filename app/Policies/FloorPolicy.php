<?php

declare(strict_types=1);

namespace App\Policies;

use App\Helpers\Constants;
use App\Helpers\Enums\UserRole;
use App\Helpers\Helper;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Floor;
use MoonShine\Models\MoonshineUser;

class FloorPolicy
{
    use HandlesAuthorization;

    public function viewAny(MoonshineUser $user): bool
    {
        return true;
    }

    public function view(MoonshineUser $user, Floor $item): bool
    {
        if (Helper::isUserInRole(UserRole::Developer)) {
            return $item->hotel->created_by === $user->id;
        }

        return true;
    }

    public function create(MoonshineUser $user): bool
    {
        return true;
    }

    public function update(MoonshineUser $user, Floor $item): bool
    {
        if (Helper::isUserInRole(UserRole::Developer)) {
            return $item->hotel->created_by === $user->id;
        }

        return true;
    }

    public function delete(MoonshineUser $user, Floor $item): bool
    {
        if (Helper::isUserInRole(UserRole::Developer)) {
            return $item->hotel->created_by === $user->id;
        }

        return true;
    }

    public function restore(MoonshineUser $user, Floor $item): bool
    {
        if (Helper::isUserInRole(UserRole::Admin)) {
            return true;
        }

        return false;
    }

    public function forceDelete(MoonshineUser $user, Floor $item): bool
    {
        if (Helper::isUserInRole(UserRole::Admin)) {
            return true;
        }

        return false;
    }

    public function massDelete(MoonshineUser $user): bool
    {
        if (Helper::isUserInRole(UserRole::Admin)) {
            return true;
        }

        return false;
    }
}
