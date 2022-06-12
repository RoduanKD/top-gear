<?php

namespace App\Listeners;

use App\Events\MessageReceived;
use App\Mail\ContactThanks;
use App\Models\User;
use App\Notifications\MessageReceived as NotificationsMessageReceived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendThanksEmail
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
     * @param  \App\Events\MessageReceived  $event
     * @return void
     */
    public function handle(MessageReceived $event)
    {
        Mail::to($event->email)->send(new ContactThanks);
        User::first()->notify(new NotificationsMessageReceived);
    }
}
