<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 17/04/2017
 * Time: 10:12 PM
 */

namespace App\Listeners\ProductManagement;


use App\Jobs\LogUserActivity;

class ProductSubscriber
{
    const MODULE = 'ProductManagement\Product';

    public function onBeforeIndex()
    {

    }

    public function onAfterIndex()
    {
        $action = __FUNCTION__;
        $this->logUserActivity($action);
    }

    public function onBeforeShow($event)
    {
        $product = $event->product;
    }

    public function onAfterShow($event)
    {
        $product = $event->product;
        $action = __FUNCTION__ . "{ product_id: {$product->getKey()} }";
        $this->logUserActivity($action);
    }

    public function onBeforeCreate()
    {

    }

    public function onAfterCreate()
    {
        $action = __FUNCTION__;
        $this->logUserActivity($action);
    }

    public function onBeforeStore()
    {

    }

    public function onAfterStore($event)
    {
        $product = $event->product;
        $action = __FUNCTION__ . "{ product_id: {$product->getKey()} }";
        $this->logUserActivity($action);
    }

    public function onBeforeEdit($event)
    {
        $product = $event->product;
    }

    public function onAfterEdit($event)
    {
        $product = $event->product;
        $action = __FUNCTION__ . "{ product_id: {$product->getKey()} }";
        $this->logUserActivity($action);
    }

    public function onBeforeUpdate($event)
    {
        $product = $event->product;
    }

    public function onAfterUpdate($event)
    {
        $product = $event->product;
        $action = __FUNCTION__ . "{ product_id: {$product->getKey()} }";
        $this->logUserActivity($action);
    }

    public function onBeforeDestroy($event)
    {
        $product = $event->product;
        $action = __FUNCTION__ . "{ product_id: {$product->getKey()} }";
        $this->logUserActivity($action);
    }

    public function onAfterDestroy()
    {
        $activity = "Deleted Product";
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
            'App\Events\ProductManagement\Product\BeforeIndex',
            'App\Listeners\Product\ProductSubscriber@onBeforeIndex'
        );
        $events->listen(
            'App\Events\ProductManagement\Product\AfterIndex',
            'App\Listeners\Product\ProductSubscriber@onAfterIndex'
        );

        $events->listen(
            'App\Events\ProductManagement\Product\BeforeShow',
            'App\Listeners\Product\ProductSubscriber@onBeforeShow'
        );
        $events->listen(
            'App\Events\ProductManagement\Product\AfterShow',
            'App\Listeners\Product\ProductSubscriber@onAfterShow'
        );

        $events->listen(
            'App\Events\ProductManagement\Product\BeforeCreate',
            'App\Listeners\Product\ProductSubscriber@onBeforeCreate'
        );
        $events->listen(
            'App\Events\ProductManagement\Product\AfterCreate',
            'App\Listeners\Product\ProductSubscriber@onAfterCreate'
        );

        $events->listen(
            'App\Events\ProductManagement\Product\BeforeStore',
            'App\Listeners\Product\ProductSubscriber@onBeforeStore'
        );
        $events->listen(
            'App\Events\ProductManagement\Product\AfterStore',
            'App\Listeners\Product\ProductSubscriber@onAfterStore'
        );

        $events->listen(
            'App\Events\ProductManagement\Product\BeforeEdit',
            'App\Listeners\Product\ProductSubscriber@onBeforeEdit'
        );
        $events->listen(
            'App\Events\ProductManagement\Product\AfterEdit',
            'App\Listeners\Product\ProductSubscriber@onAfterEdit'
        );

        $events->listen(
            'App\Events\ProductManagement\Product\BeforeUpdate',
            'App\Listeners\Product\ProductSubscriber@onBeforeUpdate'
        );
        $events->listen(
            'App\Events\ProductManagement\Product\AfterUpdate',
            'App\Listeners\Product\ProductSubscriber@onAfterUpdate'
        );

        $events->listen(
            'App\Events\ProductManagement\Product\BeforeDestroy',
            'App\Listeners\Product\ProductSubscriber@onBeforeDestroy'
        );
        $events->listen(
            'App\Events\ProductManagement\Product\AfterDestroy',
            'App\Listeners\Product\ProductSubscriber@onAfterDestroy'
        );
    }
}