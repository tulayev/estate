<?php

declare(strict_types=1);

namespace App\Policies;

use App\Helpers\Enums\UserRole;
use App\Helpers\Helper;
use Illuminate\Auth\Access\HandlesAuthorization;
use MoonShine\Models\MoonshineUser;

class MoonshineUserPolicy
{
    use HandlesAuthorization;

    public function viewAny(MoonshineUser $user): bool
    {
        if (Helper::isUserInRole(UserRole::Admin)) {
            return true;
        }

        return false;
    }

    public function view(MoonshineUser $user, MoonshineUser $item): bool
    {
        if (Helper::isUserInRole(UserRole::Admin)) {
            return true;
        }

        return false;
    }

    public function create(MoonshineUser $user): bool
    {
        if (Helper::isUserInRole(UserRole::Admin)) {
            return true;
        }

        return false;
    }

    public function update(MoonshineUser $user, MoonshineUser $item): bool
    {
        if (Helper::isUserInRole(UserRole::Admin)) {
            return $user->id != $item->id;
        }

        return false;
    }

    public function delete(MoonshineUser $user, MoonshineUser $item): bool
    {
        if (Helper::isUserInRole(UserRole::Admin)) {
            return $user->id != $item->id;
        }

        return false;
    }

    public function restore(MoonshineUser $user, MoonshineUser $item): bool
    {
        if (Helper::isUserInRole(UserRole::Admin)) {
            return true;
        }

        return false;
    }

    public function forceDelete(MoonshineUser $user, MoonshineUser $item): bool
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
