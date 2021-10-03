<?php

namespace App\Policies;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TagPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Tag $tag)
    {
        return true;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, Tag $tag)
    {
        return false;
    }

    public function delete(User $user, Tag $tag)
    {
        return false;
    }

    public function restore(User $user, Tag $tag)
    {
        return false;
    }

    public function forceDelete(User $user, Tag $tag)
    {
        return false;
    }
}
