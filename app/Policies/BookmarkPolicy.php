<?php

namespace App\Policies;

use App\Models\Bookmark;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookmarkPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return false;
    }

    public function view(User $user, Bookmark $bookmark)
    {
        return $user->id === $bookmark->user()->id;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Bookmark $bookmark)
    {
        return false;
    }

    public function delete(User $user, Bookmark $bookmark)
    {
        return $user->id === $bookmark->user()->id;
    }

    public function restore(User $user, Bookmark $bookmark)
    {
        return false;
    }

    public function forceDelete(User $user, Bookmark $bookmark)
    {
        return false;
    }
}
