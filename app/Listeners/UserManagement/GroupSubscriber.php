<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 17/04/2017
 * Time: 11:22 PM
 */

namespace App\Listeners\UserManagement;


use App\Jobs\LogUserActivity;

class GroupSubscriber
{
    const MODULE = 'UserManagement\Group';

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
        $group = $event->group;
    }

    public function onAfterShow($event)
    {
        $group = $event->group;
        $action = __FUNCTION__ . "{ group_id: {$group->getKey()} }";
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
        $group = $event->group;
        $action = __FUNCTION__ . "{ group_id: {$group->getKey()} }";
        $this->logUserActivity($action);
    }

    public function onBeforeEdit($event)
    {
        $group = $event->group;
    }

    public function onAfterEdit($event)
    {
        $group = $event->group;
        $action = __FUNCTION__ . "{ group_id: {$group->getKey()} }";
        $this->logUserActivity($action);
    }

    public function onBeforeUpdate($event)
    {
        $group = $event->group;
    }

    public function onAfterUpdate($event)
    {
        $group = $event->group;
        $action = __FUNCTION__ . "{ group_id: {$group->getKey()} }";
        $this->logUserActivity($action);
    }

    public function onBeforeDestroy($event)
    {
        $group = $event->group;
        $action = __FUNCTION__ . "{ group_id: {$group->getKey()} }";
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
            'App\Events\UserManagement\Group\BeforeIndex',
            'App\Listeners\UserManagement\GroupSubscriber@onBeforeIndex'
        );
        $events->listen(
            'App\Events\UserManagement\Group\AfterIndex',
            'App\Listeners\UserManagement\GroupSubscriber@onAfterIndex'
        );

        $events->listen(
            'App\Events\UserManagement\Group\BeforeShow',
            'App\Listeners\UserManagement\GroupSubscriber@onBeforeShow'
        );
        $events->listen(
            'App\Events\UserManagement\Group\AfterShow',
            'App\Listeners\UserManagement\GroupSubscriber@onAfterShow'
        );

        $events->listen(
            'App\Events\UserManagement\Group\BeforeCreate',
            'App\Listeners\UserManagement\GroupSubscriber@onBeforeCreate'
        );
        $events->listen(
            'App\Events\UserManagement\Group\AfterCreate',
            'App\Listeners\UserManagement\GroupSubscriber@onAfterCreate'
        );

        $events->listen(
            'App\Events\UserManagement\Group\BeforeStore',
            'App\Listeners\UserManagement\GroupSubscriber@onBeforeStore'
        );
        $events->listen(
            'App\Events\UserManagement\Group\AfterStore',
            'App\Listeners\UserManagement\GroupSubscriber@onAfterStore'
        );

        $events->listen(
            'App\Events\UserManagement\Group\BeforeEdit',
            'App\Listeners\UserManagement\GroupSubscriber@onBeforeEdit'
        );
        $events->listen(
            'App\Events\UserManagement\Group\AfterEdit',
            'App\Listeners\UserManagement\GroupSubscriber@onAfterEdit'
        );

        $events->listen(
            'App\Events\UserManagement\Group\BeforeUpdate',
            'App\Listeners\UserManagement\GroupSubscriber@onBeforeUpdate'
        );
        $events->listen(
            'App\Events\UserManagement\Group\AfterUpdate',
            'App\Listeners\UserManagement\GroupSubscriber@onAfterUpdate'
        );

        $events->listen(
            'App\Events\UserManagement\Group\BeforeDestroy',
            'App\Listeners\UserManagement\GroupSubscriber@onBeforeDestroy'
        );
        $events->listen(
            'App\Events\UserManagement\Group\AfterDestroy',
            'App\Listeners\UserManagement\GroupSubscriber@onAfterDestroy'
        );
    }
}