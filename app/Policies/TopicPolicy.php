<?php

declare(strict_types=1);

namespace App\Policies;

use App\Helpers\Constants;
use App\Helpers\Enums\UserRole;
use App\Helpers\Helper;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Topic;
use MoonShine\Models\MoonshineUser;

class TopicPolicy
{
    use HandlesAuthorization;

    public function viewAny(MoonshineUser $user): bool
    {
        if (Helper::isUserInRole(UserRole::Developer)) {
            return false;
        }

        return true;
    }

    public function view(MoonshineUser $user, Topic $item): bool
    {
        if (Helper::isUserInRole(UserRole::Developer)) {
            return false;
        }

        return true;
    }

    public function create(MoonshineUser $user): bool
    {
        if (Helper::isUserInRole(UserRole::Developer)) {
            return false;
        }

        return true;
    }

    public function update(MoonshineUser $user, Topic $item): bool
    {
        if (Helper::isUserInRole(UserRole::Developer)) {
            return false;
        }

        return true;
    }

    public function delete(MoonshineUser $user, Topic $item): bool
    {
        if (Helper::isUserInRole(UserRole::Developer)) {
            return false;
        }

        return true;
    }

    public function restore(MoonshineUser $user, Topic $item): bool
    {
        if (Helper::isUserInRole(UserRole::Admin)) {
            return true;
        }

        return false;
    }

    public function forceDelete(MoonshineUser $user, Topic $item): bool
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
