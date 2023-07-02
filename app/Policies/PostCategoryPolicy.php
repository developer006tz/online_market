<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PostCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the postCategory can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list postcategories');
    }

    /**
     * Determine whether the postCategory can view the model.
     */
    public function view(User $user, PostCategory $model): bool
    {
        return $user->hasPermissionTo('view postcategories');
    }

    /**
     * Determine whether the postCategory can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create postcategories');
    }

    /**
     * Determine whether the postCategory can update the model.
     */
    public function update(User $user, PostCategory $model): bool
    {
        return $user->hasPermissionTo('update postcategories');
    }

    /**
     * Determine whether the postCategory can delete the model.
     */
    public function delete(User $user, PostCategory $model): bool
    {
        return $user->hasPermissionTo('delete postcategories');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete postcategories');
    }

    /**
     * Determine whether the postCategory can restore the model.
     */
    public function restore(User $user, PostCategory $model): bool
    {
        return false;
    }

    /**
     * Determine whether the postCategory can permanently delete the model.
     */
    public function forceDelete(User $user, PostCategory $model): bool
    {
        return false;
    }
}