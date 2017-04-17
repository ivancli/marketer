<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 17/04/2017
 * Time: 11:22 PM
 */

namespace App\Listeners\UserManagement;


use App\Jobs\LogUserActivity;

class UserSubscriber
{
    const MODULE = 'UserManagement\User';


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
        $user = $event->user;
    }

    public function onAfterShow($event)
    {
        $user = $event->user;
        $action = __FUNCTION__ . "{ user_id: {$user->getKey()} }";
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
        $user = $event->user;
        $action = __FUNCTION__ . "{ user_id: {$user->getKey()} }";
        $this->logUserActivity($action);
    }

    public function onBeforeEdit($event)
    {
        $user = $event->user;
    }

    public function onAfterEdit($event)
    {
        $user = $event->user;
        $action = __FUNCTION__ . "{ user_id: {$user->getKey()} }";
        $this->logUserActivity($action);
    }

    public function onBeforeUpdate($event)
    {
        $user = $event->user;
    }

    public function onAfterUpdate($event)
    {
        $user = $event->user;
        $action = __FUNCTION__ . "{ user_id: {$user->getKey()} }";
        $this->logUserActivity($action);
    }

    public function onBeforeDestroy($event)
    {
        $user = $event->user;
        $action = __FUNCTION__ . "{ user_id: {$user->getKey()} }";
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
            'App\Events\UserManagement\User\BeforeIndex',
            'App\Listeners\UserManagement\UserSubscriber@onBeforeIndex'
        );
        $events->listen(
            'App\Events\UserManagement\User\AfterIndex',
            'App\Listeners\UserManagement\UserSubscriber@onAfterIndex'
        );

        $events->listen(
            'App\Events\UserManagement\User\BeforeShow',
            'App\Listeners\UserManagement\UserSubscriber@onBeforeShow'
        );
        $events->listen(
            'App\Events\UserManagement\User\AfterShow',
            'App\Listeners\UserManagement\UserSubscriber@onAfterShow'
        );

        $events->listen(
            'App\Events\UserManagement\User\BeforeCreate',
            'App\Listeners\UserManagement\UserSubscriber@onBeforeCreate'
        );
        $events->listen(
            'App\Events\UserManagement\User\AfterCreate',
            'App\Listeners\UserManagement\UserSubscriber@onAfterCreate'
        );

        $events->listen(
            'App\Events\UserManagement\User\BeforeStore',
            'App\Listeners\UserManagement\UserSubscriber@onBeforeStore'
        );
        $events->listen(
            'App\Events\UserManagement\User\AfterStore',
            'App\Listeners\UserManagement\UserSubscriber@onAfterStore'
        );

        $events->listen(
            'App\Events\UserManagement\User\BeforeEdit',
            'App\Listeners\UserManagement\UserSubscriber@onBeforeEdit'
        );
        $events->listen(
            'App\Events\UserManagement\User\AfterEdit',
            'App\Listeners\UserManagement\UserSubscriber@onAfterEdit'
        );

        $events->listen(
            'App\Events\UserManagement\User\BeforeUpdate',
            'App\Listeners\UserManagement\UserSubscriber@onBeforeUpdate'
        );
        $events->listen(
            'App\Events\UserManagement\User\AfterUpdate',
            'App\Listeners\UserManagement\UserSubscriber@onAfterUpdate'
        );

        $events->listen(
            'App\Events\UserManagement\User\BeforeDestroy',
            'App\Listeners\UserManagement\UserSubscriber@onBeforeDestroy'
        );
        $events->listen(
            'App\Events\UserManagement\User\AfterDestroy',
            'App\Listeners\UserManagement\UserSubscriber@onAfterDestroy'
        );
    }
}