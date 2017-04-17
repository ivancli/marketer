<?php
/**
 * Created by PhpStorm.
 * User: ivan.li
 * Date: 2/10/2017
 * Time: 5:04 PM
 */

namespace App\Listeners\AuthManagement;


use App\Jobs\LogUserActivity;

class AuthenticationSubscriber
{
    const MODULE = 'AuthManagement\Authentication';

    public function onAuthAttempting($event)
    {

    }

    public function onAuthAuthenticated($event)
    {

    }

    public function onAuthFailed($event)
    {

    }

    public function onAuthLockout($event)
    {

    }

    public function onAuthLogin($event)
    {
        $user = $event->user;

        $action = __FUNCTION__;
        $this->logUserActivity($action);

    }

    public function onAuthLogout($event)
    {

    }

    public function onAuthRegistered($event)
    {

        $user = $event->user;

        $action = __FUNCTION__;
        $this->logUserActivity($action);

        /*TODO attach roles*/
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

    /**
     * register events for the subscriber
     * @param $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Attempting',
            'App\Listeners\AuthManagement\AuthenticationSubscriber@onAuthAttempting'
        );

        $events->listen(
            'Illuminate\Auth\Events\Authenticated',
            'App\Listeners\AuthManagement\AuthenticationSubscriber@onAuthAuthenticated'
        );

        $events->listen(
            'Illuminate\Auth\Events\Failed',
            'App\Listeners\AuthManagement\AuthenticationSubscriber@onAuthFailed'
        );

        $events->listen(
            'Illuminate\Auth\Events\Lockout',
            'App\Listeners\AuthManagement\AuthenticationSubscriber@onAuthLockout'
        );

        $events->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\AuthManagement\AuthenticationSubscriber@onAuthLogin'
        );

        $events->listen(
            'Illuminate\Auth\Events\Logout',
            'App\Listeners\AuthManagement\AuthenticationSubscriber@onAuthLogout'
        );

        $events->listen(
            'Illuminate\Auth\Events\Registered',
            'App\Listeners\AuthManagement\AuthenticationSubscriber@onAuthRegistered'
        );
    }
}