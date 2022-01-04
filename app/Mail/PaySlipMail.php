<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaySlipMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pay_data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pay_data)
    {
        $this->pay_data = $pay_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail_slip');
    }
}
