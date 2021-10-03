<?php

namespace App\Policies;

use App\Models\Image;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImagePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Image $image)
    {
        return true;
    }
    
    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Image $image)
    {
        return $user->id === $image->user()->id;
    }

    public function delete(User $user, Image $image)
    {
        return $user->id === $image->user()->id;
    }

    public function restore(User $user, Image $image)
    {
        return false;
    }

    public function forceDelete(User $user, Image $image)
    {
        return false;
    }
}
