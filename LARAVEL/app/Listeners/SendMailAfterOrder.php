<?php

namespace App\Listeners;

use App\Events\PaymentEvent;
use App\Models\OrderDetail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class SendMailAfterOrder implements ShouldQueue
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
    public function handle(PaymentEvent $event): void
    {
        // sleep(10);
        $dataInvoice = $event->dataInvoice;
        $dataCart = $event->dataCart;
        $dataCustomer = $event->dataCustomer;
        $email = $dataCustomer->email;
        $dataTotal = $event->dataTotal;

        $subject = "Hóa đơn của bạn !";
        $content = [
            'Invoice' => $dataInvoice,
            'Cart' => $dataCart,
            'Customer' => $dataCustomer,
            'dataTotal' => $dataTotal
        ];
        Mail::send('mails.invoice', $content, function ($message) use ($email, $subject) {
            $message->to($email)->subject($subject);
        });
    }
}
