<?php

namespace App\Providers;

use App\Policies\SlidePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \App\Slide::class => SlidePolicy::class,
    ];



    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        // Gate::define(['slide.create', 'slide.delete', 'slide.update'], function ($user) {
        //     return $user->role == 1;
        // });
        $this->registerPolicies();

        //
    }
}
