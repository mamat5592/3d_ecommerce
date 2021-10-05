<?php

namespace App\Policies;

use App\Models\ThreeDModel;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

use function PHPUnit\Framework\isEmpty;

class ThreeDModelPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return false;
    }

    public function view(User $user, ThreeDModel $threeDModel)
    {
        return false;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, ThreeDModel $threeDModel)
    {
        return $user->id === $threeDModel->user()->id;
    }

    public function delete(User $user, ThreeDModel $threeDModel)
    {
        return $user->id === $threeDModel->user()->id;
    }

    public function restore(User $user, ThreeDModel $threeDModel)
    {
        return false;
    }

    public function forceDelete(User $user, ThreeDModel $threeDModel)
    {
        return false;
    }

    public function add_category(User $user, ThreeDModel $threeDModel)
    {
        return $user->id === $threeDModel->user()->id;
    }

    public function remove_category(User $user, ThreeDModel $threeDModel)
    {
        return $user->id === $threeDModel->user()->id;
    }

    public function add_tag(User $user, ThreeDModel $threeDModel)
    {
        return $user->id === $threeDModel->user()->id;
    }

    public function remove_tag(User $user, ThreeDModel $threeDModel)
    {
        return $user->id === $threeDModel->user()->id;
    }
}
