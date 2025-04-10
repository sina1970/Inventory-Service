<?php

namespace App\Listeners;

use App\Events\InventoryNotifEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Message\Message;

class InventoryNotifListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(InventoryNotifEvent $event): void
    {
        Log::channel('log-notif')->info("product with id : {$event->inventory->product_id} stocks is below the normal rate, must be recharged");
        $message = new Message(
            body: [
                ['text' => "product with id : {$event->inventory->product_id} stocks is below the normal rate, must be recharged"]
            ]
        );
        Kafka::publish('localhost:9092')->onTopic('ineventory-notif')->withMessage($message)->send();
    }
}
