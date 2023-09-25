<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShopMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $greet, $message, $name)
    {
        $this->email = $email;
        $this->greet = $greet;
        $this->message = $message;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->view('shop.sendMail')
            ->to($this->email)
            ->subject('Rese お知らせメール')
            ->with([
                'greet' => $this->greet,
                'text' => $this->message,
                'name' => $this->name,
            ]);
    }
}
