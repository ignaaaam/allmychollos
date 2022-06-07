<?php

namespace App\Policies;

use App\Models\Discount;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class DiscountPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Discount $discount)
    {
        return $user->id === $discount->user_id
            ? Response::allow()
            : Response::deny('No eres el dueño de este descuento.');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Discount $discount)
    {
        return $user->id === $discount->user_id
            ? Response::allow()
            : Response::deny('No puedes eliminar un descuento que no es tuyo...');
    }

}
