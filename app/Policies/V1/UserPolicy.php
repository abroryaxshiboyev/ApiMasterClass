<?php

namespace App\Policies\V1;

use App\Models\Ticket;
use App\Models\User;
use App\Permissions\V1\Abilities;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function delete(User $user, Ticket $ticket): bool
    {
        return $user->tokenCan(Abilities::DeleteUser);
    }
    
    public function replace(User $user, Ticket $ticket): bool
    {
        return $user->tokenCan(Abilities::ReplaceUser);
    }

    public function store(User $user): bool
    {
        return $user->tokenCan(Abilities::CreateUser) || $user->tokenCan(Abilities::CreateOwnTicket);
    }
    public function update(User $user, Ticket $ticket): bool
    {
        if ($user->tokenCan(Abilities::UpdateTicket)) {
            return true;
        } else if ($user->tokenCan(Abilities::UpdateOwnTicket)) {

            return $user->id === $ticket->user_id;
        }

        return false;
    }

}
