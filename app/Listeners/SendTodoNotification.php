<?php

namespace App\Listeners;

use App\Events\TodoCreated;
use App\Events\TodoDeleted;
use App\Events\TodoUpdated;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class SendTodoNotification
{
    protected $messaging;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        $factory = (new Factory)
            ->withServiceAccount(config('filesystems.disks.local.root') . '/' . env('FIREBASE_CREDENTIALS'));

        $this->messaging = $factory->createMessaging();
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $title = "To-Do Item";
        $body = "";

        if ($event instanceof TodoCreated) {
            $body = "A new to-do item '{$event->todo->title}' has been created.";
        } elseif ($event instanceof TodoUpdated) {
            $body = "The to-do item '{$event->todo->title}' has been updated.";
        } elseif ($event instanceof TodoDeleted) {
            $body = "The to-do item '{$event->todo->title}' has been deleted.";
        }

        $notification = Notification::create($title, $body);

        $message = CloudMessage::withTarget('topic', 'todos')
            ->withNotification($notification);

        $this->messaging->send($message);
    }
}
