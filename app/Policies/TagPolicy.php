<?php

declare(strict_types=1);

namespace App\Policies;

use App\Helpers\Constants;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Tag;
use MoonShine\Models\MoonshineUser;

class TagPolicy
{
    use HandlesAuthorization;

    public function viewAny(MoonshineUser $user): bool
    {
        if ($user->moonshineUserRole->id === Constants::ROLES['Admin']) {
            return true;
        }

        return false;
    }

    public function view(MoonshineUser $user, Tag $item): bool
    {
        if ($user->moonshineUserRole->id === Constants::ROLES['Admin']) {
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

    public function update(MoonshineUser $user, Tag $item): bool
    {
        if (in_array($item->id, Constants::SYSTEM_TAG_IDS)) {
            return false;
        }

        if ($user->moonshineUserRole->id === Constants::ROLES['Admin']) {
            return true;
        }

        return false;
    }

    public function delete(MoonshineUser $user, Tag $item): bool
    {
        if (in_array($item->id, Constants::SYSTEM_TAG_IDS)) {
            return false;
        }

        if ($user->moonshineUserRole->id === Constants::ROLES['Admin']) {
            return true;
        }

        return false;
    }

    public function restore(MoonshineUser $user, Tag $item): bool
    {
        if ($user->moonshineUserRole->id === Constants::ROLES['Admin']) {
            return true;
        }

        return false;
    }

    public function forceDelete(MoonshineUser $user, Tag $item): bool
    {
        if (in_array($item->id, Constants::SYSTEM_TAG_IDS)) {
            return false;
        }

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
