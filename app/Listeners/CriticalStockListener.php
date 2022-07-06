<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\CriticalStock;
use App\Events\CriticalStockEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class CriticalStockListener
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
     * @param  \App\Events\CriticalStockEvent  $event
     * @return void
     */
    public function handle(CriticalStockEvent $event){
        User::whereHas("roles", function ($q) {
            $q->where("name", "Admin");
        })->get()->each(function (User $user) use ($event) {
            Notification::send($user,new CriticalStock($event->product, $event->branch, $event->stock));
        });
    }
}
