<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\OutOfStock;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class OutOfStockListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        User::whereHas("roles", function ($q) {
            $q->where("name", "Admin");
        })->get()->each(function (User $user) use ($event) {
            Notification::send($user,new OutOfStock($event->product, $event->branch));
        });
    }
}
