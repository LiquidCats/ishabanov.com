<?php

namespace App\Policies;

use App\Data\Models\Experience;
use App\Models\User;
use Illuminate\Auth\Access\{HandlesAuthorization, Response};

class ExperiencePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response|bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Experience $experience): Response|bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response|bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Experience $experience): Response|bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Experience $experience): Response|bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Experience $experience): Response|bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Experience $experience): Response|bool
    {
        return false;
    }
}
