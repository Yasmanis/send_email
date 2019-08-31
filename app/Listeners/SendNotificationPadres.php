<?php

namespace App\Listeners;

use App\User;
use App\Notifications\SendNotification;
use App\Events\CorreoPadres;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotificationPadres implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CorreoPadres  $event
     * @return void
     */
    public function handle(CorreoPadres $event)
    {
        $message = $event->message;

        //capturamos el usuario al que seenvia el mensaje
        $recipient = User::find($message->recipient_id);
        //enviar notification por correo
        $recipient->notify(new SendNotification($message));
        
    }
}
