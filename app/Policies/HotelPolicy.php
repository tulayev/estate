<?php

declare(strict_types=1);

namespace App\Policies;

use App\Helpers\Constants;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Hotel;
use MoonShine\Models\MoonshineUser;

class HotelPolicy
{
    use HandlesAuthorization;

    public function viewAny(MoonshineUser $user): bool
    {
        return true;
    }

    public function view(MoonshineUser $user, Hotel $item): bool
    {
        if ($user->moonshineUserRole->id === Constants::ROLES['Developer']) {
            return $item->created_by === $user->id;
        }

        return true;
    }

    public function create(MoonshineUser $user): bool
    {
        return true;
    }

    public function update(MoonshineUser $user, Hotel $item): bool
    {
        if ($user->moonshineUserRole->id === Constants::ROLES['Developer']) {
            return $item->created_by === $user->id;
        }

        return true;
    }

    public function delete(MoonshineUser $user, Hotel $item): bool
    {
        if ($user->moonshineUserRole->id === Constants::ROLES['Developer']) {
            return $item->created_by === $user->id;
        }

        return true;
    }

    public function restore(MoonshineUser $user, Hotel $item): bool
    {
        if ($user->moonshineUserRole->id === Constants::ROLES['Admin']) {
            return true;
        }

        return false;
    }

    public function forceDelete(MoonshineUser $user, Hotel $item): bool
    {
        if ($user->moonshineUserRole->id === Constants::ROLES['Admin']) {
            return true;
        }

        return false;
    }

    public function massDelete(MoonshineUser $user): bool
    {
        if ($user->moonshineUserRole->id === Constants::ROLES['Admin']) {
            return true;
        }

        return false;
    }
}
