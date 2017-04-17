<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 17/04/2017
 * Time: 11:22 PM
 */

namespace App\Listeners\UserManagement;


use App\Jobs\LogUserActivity;

class PermissionSubscriber
{
    const MODULE = 'UserManagement\Permission';

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
        $permission = $event->permission;
    }

    public function onAfterShow($event)
    {
        $permission = $event->permission;
        $action = __FUNCTION__ . "{ permission_id: {$permission->getKey()} }";
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
        $permission = $event->permission;
        $action = __FUNCTION__ . "{ permission_id: {$permission->getKey()} }";
        $this->logUserActivity($action);
    }

    public function onBeforeEdit($event)
    {
        $permission = $event->permission;
    }

    public function onAfterEdit($event)
    {
        $permission = $event->permission;
        $action = __FUNCTION__ . "{ permission_id: {$permission->getKey()} }";
        $this->logUserActivity($action);
    }

    public function onBeforeUpdate($event)
    {
        $permission = $event->permission;
    }

    public function onAfterUpdate($event)
    {
        $permission = $event->permission;
        $action = __FUNCTION__ . "{ permission_id: {$permission->getKey()} }";
        $this->logUserActivity($action);
    }

    public function onBeforeDestroy($event)
    {
        $permission = $event->permission;
        $action = __FUNCTION__ . "{ permission_id: {$permission->getKey()} }";
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
            'App\Events\UserManagement\Permission\BeforeIndex',
            'App\Listeners\UserManagement\PermissionSubscriber@onBeforeIndex'
        );
        $events->listen(
            'App\Events\UserManagement\Permission\AfterIndex',
            'App\Listeners\UserManagement\PermissionSubscriber@onAfterIndex'
        );

        $events->listen(
            'App\Events\UserManagement\Permission\BeforeShow',
            'App\Listeners\UserManagement\PermissionSubscriber@onBeforeShow'
        );
        $events->listen(
            'App\Events\UserManagement\Permission\AfterShow',
            'App\Listeners\UserManagement\PermissionSubscriber@onAfterShow'
        );

        $events->listen(
            'App\Events\UserManagement\Permission\BeforeCreate',
            'App\Listeners\UserManagement\PermissionSubscriber@onBeforeCreate'
        );
        $events->listen(
            'App\Events\UserManagement\Permission\AfterCreate',
            'App\Listeners\UserManagement\PermissionSubscriber@onAfterCreate'
        );

        $events->listen(
            'App\Events\UserManagement\Permission\BeforeStore',
            'App\Listeners\UserManagement\PermissionSubscriber@onBeforeStore'
        );
        $events->listen(
            'App\Events\UserManagement\Permission\AfterStore',
            'App\Listeners\UserManagement\PermissionSubscriber@onAfterStore'
        );

        $events->listen(
            'App\Events\UserManagement\Permission\BeforeEdit',
            'App\Listeners\UserManagement\PermissionSubscriber@onBeforeEdit'
        );
        $events->listen(
            'App\Events\UserManagement\Permission\AfterEdit',
            'App\Listeners\UserManagement\PermissionSubscriber@onAfterEdit'
        );

        $events->listen(
            'App\Events\UserManagement\Permission\BeforeUpdate',
            'App\Listeners\UserManagement\PermissionSubscriber@onBeforeUpdate'
        );
        $events->listen(
            'App\Events\UserManagement\Permission\AfterUpdate',
            'App\Listeners\UserManagement\PermissionSubscriber@onAfterUpdate'
        );

        $events->listen(
            'App\Events\UserManagement\Permission\BeforeDestroy',
            'App\Listeners\UserManagement\PermissionSubscriber@onBeforeDestroy'
        );
        $events->listen(
            'App\Events\UserManagement\Permission\AfterDestroy',
            'App\Listeners\UserManagement\PermissionSubscriber@onAfterDestroy'
        );
    }
}