<?php

namespace App\Policies;

use App\Models\Communication;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CommunicationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        //
        return $user->role === 'admin'
            ? Response::allow()
            : Response::deny('You are not authorized to view communications.');

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Communication $communication): Response
    {
        //
        return $user->role === 'admin' || $user->profile_id === $communication->sender_id || $user->profile_id === $communication->receiver_id
            ? Response::allow()
            : Response::deny('You are not authorized to view this communication.');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {

        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Communication $communication): Response
    {
        //
        return ($user->role === 'admin' || $user->profile_id === $communication->sender_id) && $communication->read_at === false
            ? Response::allow()
            : Response::deny('You are not authorized to update this communication.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Communication $communication): bool
    {

        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Communication $communication): bool
    {

        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Communication $communication): bool
    {

        return false;
    }
}
