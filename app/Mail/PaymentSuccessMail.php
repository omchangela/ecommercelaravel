<?php

// app/Mail/PaymentSuccessMail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    public $orderDetails;

    public function __construct($orderDetails)
    {
        $this->orderDetails = $orderDetails;
    }

    public function build()
    {
        return $this->view('emails.payment_success')
                    ->with([
                        'orderDetails' => $this->orderDetails,
                    ])
                    ->subject('Your Payment was Successful!');
    }
}
