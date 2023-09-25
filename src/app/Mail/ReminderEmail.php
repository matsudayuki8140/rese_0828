<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReminderEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
            ->subject('Rese 予約確認メール')
            ->with([
                'greet' => 'ご予約当日です',
                'text' => 'Reseにログインして、予約情報をご確認ください。ご来店お待ちしております。',
            ]);
    }
}
