<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $orderCode;
    public $carData;
    public $cartNUmber;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->orderData = $data['orderCode'];
        $this->cartData = $data['cartData'];
        $this->customer = $data['customer'];

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('maileshop55@gmail.com')
        ->view('home.mail.index',['cartData'=> $this->cartData,'customer'=>$this->customer,'orderCode'=>$this->orderCode])->subject('Thanh toán đơn hàng'.$this->orderCode);
    }
}
