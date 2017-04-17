<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        #region product
        'App\Events\ProductManagement\Product\BeforeIndex' => [],
        'App\Events\ProductManagement\Product\AfterIndex' => [],
        'App\Events\ProductManagement\Product\BeforeShow' => [],
        'App\Events\ProductManagement\Product\AfterShow' => [],
        'App\Events\ProductManagement\Product\BeforeCreate' => [],
        'App\Events\ProductManagement\Product\AfterCreate' => [],
        'App\Events\ProductManagement\Product\BeforeStore' => [],
        'App\Events\ProductManagement\Product\AfterStore' => [],
        'App\Events\ProductManagement\Product\BeforeEdit' => [],
        'App\Events\ProductManagement\Product\AfterEdit' => [],
        'App\Events\ProductManagement\Product\BeforeUpdate' => [],
        'App\Events\ProductManagement\Product\AfterUpdate' => [],
        'App\Events\ProductManagement\Product\BeforeDestroy' => [],
        'App\Events\ProductManagement\Product\AfterDestroy' => [],
        #endregion

        #region user
        'App\Events\UserManagement\User\BeforeIndex' => [],
        'App\Events\UserManagement\User\AfterIndex' => [],
        'App\Events\UserManagement\User\BeforeShow' => [],
        'App\Events\UserManagement\User\AfterShow' => [],
        'App\Events\UserManagement\User\BeforeCreate' => [],
        'App\Events\UserManagement\User\AfterCreate' => [],
        'App\Events\UserManagement\User\BeforeStore' => [],
        'App\Events\UserManagement\User\AfterStore' => [],
        'App\Events\UserManagement\User\BeforeEdit' => [],
        'App\Events\UserManagement\User\AfterEdit' => [],
        'App\Events\UserManagement\User\BeforeUpdate' => [],
        'App\Events\UserManagement\User\AfterUpdate' => [],
        'App\Events\UserManagement\User\BeforeDestroy' => [],
        'App\Events\UserManagement\User\AfterDestroy' => [],
        #endregion

        #region group
        'App\Events\UserManagement\Group\BeforeIndex' => [],
        'App\Events\UserManagement\Group\AfterIndex' => [],
        'App\Events\UserManagement\Group\BeforeShow' => [],
        'App\Events\UserManagement\Group\AfterShow' => [],
        'App\Events\UserManagement\Group\BeforeCreate' => [],
        'App\Events\UserManagement\Group\AfterCreate' => [],
        'App\Events\UserManagement\Group\BeforeStore' => [],
        'App\Events\UserManagement\Group\AfterStore' => [],
        'App\Events\UserManagement\Group\BeforeEdit' => [],
        'App\Events\UserManagement\Group\AfterEdit' => [],
        'App\Events\UserManagement\Group\BeforeUpdate' => [],
        'App\Events\UserManagement\Group\AfterUpdate' => [],
        'App\Events\UserManagement\Group\BeforeDestroy' => [],
        'App\Events\UserManagement\Group\AfterDestroy' => [],
        #endregion

        #region role
        'App\Events\UserManagement\Role\BeforeIndex' => [],
        'App\Events\UserManagement\Role\AfterIndex' => [],
        'App\Events\UserManagement\Role\BeforeShow' => [],
        'App\Events\UserManagement\Role\AfterShow' => [],
        'App\Events\UserManagement\Role\BeforeCreate' => [],
        'App\Events\UserManagement\Role\AfterCreate' => [],
        'App\Events\UserManagement\Role\BeforeStore' => [],
        'App\Events\UserManagement\Role\AfterStore' => [],
        'App\Events\UserManagement\Role\BeforeEdit' => [],
        'App\Events\UserManagement\Role\AfterEdit' => [],
        'App\Events\UserManagement\Role\BeforeUpdate' => [],
        'App\Events\UserManagement\Role\AfterUpdate' => [],
        'App\Events\UserManagement\Role\BeforeDestroy' => [],
        'App\Events\UserManagement\Role\AfterDestroy' => [],
        #endregion

        #region permission
        'App\Events\UserManagement\Permission\BeforeIndex' => [],
        'App\Events\UserManagement\Permission\AfterIndex' => [],
        'App\Events\UserManagement\Permission\BeforeShow' => [],
        'App\Events\UserManagement\Permission\AfterShow' => [],
        'App\Events\UserManagement\Permission\BeforeCreate' => [],
        'App\Events\UserManagement\Permission\AfterCreate' => [],
        'App\Events\UserManagement\Permission\BeforeStore' => [],
        'App\Events\UserManagement\Permission\AfterStore' => [],
        'App\Events\UserManagement\Permission\BeforeEdit' => [],
        'App\Events\UserManagement\Permission\AfterEdit' => [],
        'App\Events\UserManagement\Permission\BeforeUpdate' => [],
        'App\Events\UserManagement\Permission\AfterUpdate' => [],
        'App\Events\UserManagement\Permission\BeforeDestroy' => [],
        'App\Events\UserManagement\Permission\AfterDestroy' => [],
        #endregion
    ];

    protected $subscribe = [
        #region AuthManagement
        'App\Listeners\AuthManagement\AuthenticationSubscriber',
        'App\Listeners\AuthManagement\ForgotPasswordSubscriber',
        'App\Listeners\AuthManagement\LoginSubscriber',
        'App\Listeners\AuthManagement\RegisterSubscriber',
        'App\Listeners\AuthManagement\ResetPasswordSubscriber',
        #endregion

        #region ProductManagement
        'App\Listeners\ProductManagement\ProductSubscriber',
        #endregion

        #region UserManagement
        'App\Listeners\UserManagement\GroupSubscriber',
        'App\Listeners\UserManagement\PermissionSubscriber',
        'App\Listeners\UserManagement\RoleSubscriber',
        'App\Listeners\UserManagement\UserSubscriber',
        #endregion
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
