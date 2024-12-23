<?php

declare(strict_types=1);

namespace App\Policies;

use App\Helpers\Constants;
use Illuminate\Auth\Access\HandlesAuthorization;
use MoonShine\Models\MoonshineUser;

class MoonshineUserPolicy
{
    use HandlesAuthorization;

    public function viewAny(MoonshineUser $user): bool
    {
        if ($user->moonshine_user_role_id === Constants::ROLES['Admin']) {
            return true;
        }

        return false;
    }

    public function view(MoonshineUser $user, MoonshineUser $item): bool
    {
        if ($user->moonshine_user_role_id === Constants::ROLES['Admin']) {
            return true;
        }

        return false;
    }

    public function create(MoonshineUser $user): bool
    {
        if ($user->moonshine_user_role_id === Constants::ROLES['Admin']) {
            return true;
        }

        return false;
    }

    public function update(MoonshineUser $user, MoonshineUser $item): bool
    {
        if ($user->moonshine_user_role_id === Constants::ROLES['Admin']) {
            return $user->id != $item->id;
        }

        return false;
    }

    public function delete(MoonshineUser $user, MoonshineUser $item): bool
    {
        if ($user->moonshine_user_role_id === Constants::ROLES['Admin']) {
            return $user->id != $item->id;
        }

        return false;
    }

    public function restore(MoonshineUser $user, MoonshineUser $item): bool
    {
        if ($user->moonshine_user_role_id === Constants::ROLES['Admin']) {
            return true;
        }

        return false;
    }

    public function forceDelete(MoonshineUser $user, MoonshineUser $item): bool
    {
        if ($user->moonshine_user_role_id === Constants::ROLES['Admin']) {
            return true;
        }

        return false;
    }

    public function massDelete(MoonshineUser $user): bool
    {
        if ($user->moonshine_user_role_id === Constants::ROLES['Admin']) {
            return true;
        }

        return false;
    }
}
