<?php

namespace App\Policies;

use App\Models\ThreeDModel;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

use function PHPUnit\Framework\isEmpty;

class ThreeDModelPolicy
{
    use HandlesAuthorization;

    public function update(User $user, ThreeDModel $threeDModel)
    {
        if ($user->id === $threeDModel->id) {
            return true;
        }
    }

    public function delete(User $user, ThreeDModel $threeDModel)
    {
        return $user->id === $threeDModel->id;
    }

    public function restore(User $user, ThreeDModel $threeDModel)
    {
        return false;
    }

    public function forceDelete(User $user, ThreeDModel $threeDModel)
    {
        return false;
    }
}
