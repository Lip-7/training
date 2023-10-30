<?php

namespace App\Policies;

use App\Models\Apartment;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class ApartmentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return $user !== null
        ? Response::allow()
        : Response::deny('You do not own this apartment.');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Apartment $apartment): Response
    {
        return $user->id === $apartment->user_id
            ? Response::allow()
            : Response::deny('You do not own this apartment.');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Apartment $apartment): Response
    {
        return $user->id === $apartment->user_id
            ? Response::allow()
            : Response::deny('You do not own this apartment.');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Apartment $apartment): Response
    {
        return $user->id === $apartment->user_id
            ? Response::allow()
            : Response::deny('You do not own this apartment.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Apartment $apartment): Response
    {
        return $user->id === $apartment->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Apartment $apartment): Response
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Apartment $apartment): Response
    {
        //
    }
}
