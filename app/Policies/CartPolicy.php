<?php

namespace App\Policies;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CartPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return false;
    }

    public function view(User $user, Cart $cart)
    {
        return $user->id === $cart->user()->id;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Cart $cart)
    {
        return false;
    }

    public function delete(User $user, Cart $cart)
    {
        return $user->id === $cart->user()->id;
    }

    public function restore(User $user, Cart $cart)
    {
        return false;
    }

    public function forceDelete(User $user, Cart $cart)
    {
        return false;
    }
}
