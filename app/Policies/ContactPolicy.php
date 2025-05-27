<?php

declare(strict_types=1);

namespace App\Policies;

use App\Helpers\Constants;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Contact;
use MoonShine\Models\MoonshineUser;

class ContactPolicy
{
    use HandlesAuthorization;

    public function viewAny(MoonshineUser $user): bool
    {
        if ($user->moonshineUserRole->id === Constants::ROLES['Admin'] || $user->moonshineUserRole->id === Constants::ROLES['Moderator']) {
            return true;
        }

        return false;
    }

    public function view(MoonshineUser $user, Contact $item): bool
    {
        if ($user->moonshineUserRole->id === Constants::ROLES['Admin'] || $user->moonshineUserRole->id === Constants::ROLES['Moderator']) {
            return true;
        }

        return false;
    }

    public function create(MoonshineUser $user): bool
    {
        if ($user->moonshineUserRole->id === Constants::ROLES['Admin']) {
            return true;
        }

        return false;
    }

    public function update(MoonshineUser $user, Contact $item): bool
    {
        if ($user->moonshineUserRole->id === Constants::ROLES['Admin']) {
            return true;
        }

        return false;
    }

    public function delete(MoonshineUser $user, Contact $item): bool
    {
        if ($user->moonshineUserRole->id === Constants::ROLES['Admin']) {
            return true;
        }

        return false;
    }

    public function restore(MoonshineUser $user, Contact $item): bool
    {
        if ($user->moonshineUserRole->id === Constants::ROLES['Admin']) {
            return true;
        }

        return false;
    }

    public function forceDelete(MoonshineUser $user, Contact $item): bool
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
