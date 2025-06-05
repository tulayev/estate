<?php

declare(strict_types=1);

namespace App\Policies;

use App\Helpers\Enums\UserRole;
use App\Helpers\Helper;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\TopicCategory;
use MoonShine\Models\MoonshineUser;

class TopicCategoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(MoonshineUser $user): bool
    {
        if (Helper::isUserInRole(UserRole::Admin)) {
            return true;
        }

        return false;
    }

    public function view(MoonshineUser $user, TopicCategory $item): bool
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

    public function update(MoonshineUser $user, TopicCategory $item): bool
    {
        if (Helper::isUserInRole(UserRole::Admin)) {
            return true;
        }

        return false;
    }

    public function delete(MoonshineUser $user, TopicCategory $item): bool
    {
        if (Helper::isUserInRole(UserRole::Admin)) {
            return true;
        }

        return false;
    }

    public function restore(MoonshineUser $user, TopicCategory $item): bool
    {
        if (Helper::isUserInRole(UserRole::Admin)) {
            return true;
        }

        return false;
    }

    public function forceDelete(MoonshineUser $user, TopicCategory $item): bool
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
