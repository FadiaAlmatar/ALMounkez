<?php

namespace App\Policies;

use App\Models\User;
use App\Models\FullOrder;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class FullOrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FullOrder  $fullOrder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, FullOrder $fullOrder)
    {

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        // return $user->id === $fullOrder->user_id
        //         ? Response::allow()
        //         : Response::deny('You do not own this post.');
        // return $user->role == 'writer';
    }
    // public function update(User $user, Post $post)
    // {
    //     return $user->id === $post->user_id;
    // }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FullOrder  $fullOrder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, FullOrder $fullOrder)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FullOrder  $fullOrder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, FullOrder $fullOrder)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FullOrder  $fullOrder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, FullOrder $fullOrder)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FullOrder  $fullOrder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, FullOrder $fullOrder)
    {
        //
    }
}
