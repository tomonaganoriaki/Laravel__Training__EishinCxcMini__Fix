<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;


class ThanksMail extends Mailable
{
    use Queueable, SerializesModels;

    public $products;
    public $user;

    public function __construct($products, $user)
    {
        $this->products = $products;
        $this->user = $user;
    }

    public function build()
    {

        return $this->view('emails.thanks')
            ->to($this->user->email)  // Add this line
            ->with([
                'products' => $this->products,
                'user' => $this->user,
            ])
            ->subject('ご応募ありがとうございます！');
    }
}
