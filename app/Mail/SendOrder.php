<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOrder extends Mailable
{
    use Queueable, SerializesModels;


    public $order;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.order')->with([
            'name' => isset($this->order['name']) ? $this->order['name'] : '',
            'phone' => isset($this->order['phone']) ? $this->order['phone'] : '',
            'comment' => isset($this->order['comment']) ? $this->order['comment'] : '',
            'type' => isset($this->order['type']) ? $this->order['type'] : '',
        ]);;
    }
}
