<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return false;
    }

    public function view(User $user, Permission $permission)
    {
        return false;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, Permission $permission)
    {
        return false;
    }

    public function delete(User $user, Permission $permission)
    {
        return false;
    }

    public function restore(User $user, Permission $permission)
    {
        return false;
    }

    public function forceDelete(User $user, Permission $permission)
    {
        return false;
    }
}
