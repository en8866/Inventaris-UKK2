<?php

namespace App\Policies;

use App\Models\Inventaris;
use App\Models\User;

class InventarisPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; // Both admin and staff can view
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Inventaris $inventaris): bool
    {
        return true; // Both admin and staff can view
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role === 'admin'; // Only admin can create
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Inventaris $inventaris): bool
    {
        return $user->role === 'admin'; // Only admin can update
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Inventaris $inventaris): bool
    {
        return $user->role === 'admin'; // Only admin can delete
    }
}
