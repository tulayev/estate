<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use MoonShine\Models\MoonshineUser;

class MoonshineUserPolicy
{
    use HandlesAuthorization;

    public function viewAny(MoonshineUser $user): bool
    {
        return true;
    }

    public function view(MoonshineUser $user, MoonshineUser $item): bool
    {
        return true;
    }

    public function create(MoonshineUser $user): bool
    {
        return true;
    }

    public function update(MoonshineUser $user, MoonshineUser $item): bool
    {
        return $user->id != $item->id;
    }

    public function delete(MoonshineUser $user, MoonshineUser $item): bool
    {
        return $user->id != $item->id;
    }

    public function restore(MoonshineUser $user, MoonshineUser $item): bool
    {
        return true;
    }

    public function forceDelete(MoonshineUser $user, MoonshineUser $item): bool
    {
        return false;
    }

    public function massDelete(MoonshineUser $user): bool
    {
        return false;
    }
}
