<?php

namespace App\Policies;

use App\Slide;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class SlidePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
        // check idf is admin
        // return Auth::user()->role == 1;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Slide  $slide
     * @return mixed
     */
    public function view(User $user, Slide $slide)
    {
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Slide $slide)
    {
        // return $user->role == 1;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Slide  $slide
     * @return mixed
     */
    public function update(User $user, Slide $slide)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Slide  $slide
     * @return mixed
     */
    public function delete(User $user, Slide $slide)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Slide  $slide
     * @return mixed
     */
    public function restore(User $user, Slide $slide)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Slide  $slide
     * @return mixed
     */
    public function forceDelete(User $user, Slide $slide)
    {
        //
    }
}
