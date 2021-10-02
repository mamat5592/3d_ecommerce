<?php

namespace App\Policies;

use App\Models\File;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FilePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return false;
    }

    public function view(User $user, File $file)
    {
        return false;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, File $file)
    {
        return $user->id === $file->user()->id;
    }

    public function delete(User $user, File $file)
    {
        return $user->id === $file->user()->id;
    }

    public function restore(User $user, File $file)
    {
        return false;
    }

    public function forceDelete(User $user, File $file)
    {
        return false;
    }
}
