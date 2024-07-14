<?php

namespace App\Listeners;

use App\Events\DestroyCart;
use App\Models\Cart;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Destroy implements ShouldQueue
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
    public function handle(DestroyCart $event): void
    {
        Cart::where('id_user',$event->id)->delete();
    }
}
