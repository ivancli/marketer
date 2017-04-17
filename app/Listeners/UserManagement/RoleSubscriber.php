<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 17/04/2017
 * Time: 11:22 PM
 */

namespace App\Listeners\UserManagement;


use App\Jobs\LogUserActivity;

class RoleSubscriber
{
    const MODULE = 'UserManagement\Role';

    public function onBeforeIndex($event)
    {

    }

    public function onAfterIndex($event)
    {
        $action = __FUNCTION__;
        $this->logUserActivity($action);
    }

    public function onBeforeShow($event)
    {
        $role = $event->role;
    }

    public function onAfterShow($event)
    {
        $role = $event->role;
        $action = __FUNCTION__ . "{ role_id: {$role->getKey()} }";
        $this->logUserActivity($action);
    }

    public function onBeforeCreate($event)
    {

    }

    public function onAfterCreate($event)
    {
        $action = __FUNCTION__;
        $this->logUserActivity($action);
    }

    public function onBeforeStore($event)
    {

    }

    public function onAfterStore($event)
    {
        $role = $event->role;
        $action = __FUNCTION__ . "{ role_id: {$role->getKey()} }";
        $this->logUserActivity($action);
    }

    public function onBeforeEdit($event)
    {
        $role = $event->role;
    }

    public function onAfterEdit($event)
    {
        $role = $event->role;
        $action = __FUNCTION__ . "{ role_id: {$role->getKey()} }";
        $this->logUserActivity($action);
    }

    public function onBeforeUpdate($event)
    {
        $role = $event->role;
    }

    public function onAfterUpdate($event)
    {
        $role = $event->role;
        $action = __FUNCTION__ . "{ role_id: {$role->getKey()} }";
        $this->logUserActivity($action);
    }

    public function onBeforeDestroy($event)
    {
        $role = $event->role;
        $action = __FUNCTION__ . "{ role_id: {$role->getKey()} }";
        $this->logUserActivity($action);
    }

    public function onAfterDestroy($event)
    {
        $action = __FUNCTION__;
        $this->logUserActivity($action);
    }

    /**
     * Logging user activities
     * @param $action
     */
    protected function logUserActivity($action)
    {
        dispatch(
            (new LogUserActivity(auth()->user(), self::MODULE, $action))
                ->onQueue("log")
                ->onConnection('sync')
        );
    }

    public function subscribe($events)
    {
        $events->listen(
            'App\Events\UserManagement\Role\BeforeIndex',
            'App\Listeners\UserManagement\RoleSubscriber@onBeforeIndex'
        );
        $events->listen(
            'App\Events\UserManagement\Role\AfterIndex',
            'App\Listeners\UserManagement\RoleSubscriber@onAfterIndex'
        );

        $events->listen(
            'App\Events\UserManagement\Role\BeforeShow',
            'App\Listeners\UserManagement\RoleSubscriber@onBeforeShow'
        );
        $events->listen(
            'App\Events\UserManagement\Role\AfterShow',
            'App\Listeners\UserManagement\RoleSubscriber@onAfterShow'
        );

        $events->listen(
            'App\Events\UserManagement\Role\BeforeCreate',
            'App\Listeners\UserManagement\RoleSubscriber@onBeforeCreate'
        );
        $events->listen(
            'App\Events\UserManagement\Role\AfterCreate',
            'App\Listeners\UserManagement\RoleSubscriber@onAfterCreate'
        );

        $events->listen(
            'App\Events\UserManagement\Role\BeforeStore',
            'App\Listeners\UserManagement\RoleSubscriber@onBeforeStore'
        );
        $events->listen(
            'App\Events\UserManagement\Role\AfterStore',
            'App\Listeners\UserManagement\RoleSubscriber@onAfterStore'
        );

        $events->listen(
            'App\Events\UserManagement\Role\BeforeEdit',
            'App\Listeners\UserManagement\RoleSubscriber@onBeforeEdit'
        );
        $events->listen(
            'App\Events\UserManagement\Role\AfterEdit',
            'App\Listeners\UserManagement\RoleSubscriber@onAfterEdit'
        );

        $events->listen(
            'App\Events\UserManagement\Role\BeforeUpdate',
            'App\Listeners\UserManagement\RoleSubscriber@onBeforeUpdate'
        );
        $events->listen(
            'App\Events\UserManagement\Role\AfterUpdate',
            'App\Listeners\UserManagement\RoleSubscriber@onAfterUpdate'
        );

        $events->listen(
            'App\Events\UserManagement\Role\BeforeDestroy',
            'App\Listeners\UserManagement\RoleSubscriber@onBeforeDestroy'
        );
        $events->listen(
            'App\Events\UserManagement\Role\AfterDestroy',
            'App\Listeners\UserManagement\RoleSubscriber@onAfterDestroy'
        );
    }
}