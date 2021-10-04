<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return false;
    }

    public function view(User $user, User $model)
    {
        return false;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, User $model)
    {
        return $user->id === $model->id;
    }

    public function delete(User $user, User $model)
    {
        return $user->id === $model->id;
    }

    public function restore(User $user, User $model)
    {
        return false;
    }

    public function forceDelete(User $user, User $model)
    {
        return false;
    }

    public function add_role(User $user, User $model)
    {
        return false;
    }

    public function remove_role(User $user, User $model)
    {
        return false;
    }

    public function add_skill(User $user, User $model)
    {
        return $user->id === $model->id;
    }

    public function remove_skill(User $user, User $model)
    {
        return $user->id === $model->id;
    }
}
