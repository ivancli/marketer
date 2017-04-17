<?php

namespace App\Providers;

use App\Models\Group;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Observers\GroupObserver;
use App\Observers\PermissionObserver;
use App\Observers\RoleObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Group::observe(GroupObserver::class);
        Role::observe(RoleObserver::class);
        Permission::observe(PermissionObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Contracts\UserManagement\RoleContract', 'App\Repositories\UserManagement\RoleRepository');
        $this->app->bind('App\Contracts\UserManagement\UserActivityContract', 'App\Repositories\UserManagement\UserActivityRepository');
    }
}
