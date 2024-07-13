<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PaymentEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
       public $dataInvoice;
       public $dataCustomer;
       public $dataCart;
       public $dataTotal;
    /**
     * Create a new event instance.
     */
    public function __construct($dataInvoice,$dataCustomer,$dataCart,$dataTotal)
    {
         $this->dataInvoice = $dataInvoice;
         $this->dataCustomer = $dataCustomer;
         $this->dataCart = $dataCart;
         $this->dataTotal = $dataTotal;
        //  dd($this->invoices);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
