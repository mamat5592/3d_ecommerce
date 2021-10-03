<?php

namespace App\Policies;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SkillPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Skill $skill)
    {
        return true;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, Skill $skill)
    {
        return false;
    }

    public function delete(User $user, Skill $skill)
    {
        return false;
    }

    public function restore(User $user, Skill $skill)
    {
        return false;
    }

    public function forceDelete(User $user, Skill $skill)
    {
        return false;
    }
}
