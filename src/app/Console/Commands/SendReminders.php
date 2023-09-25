<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendReminderEmail;
use App\Models\User;
use App\Models\Shop;
use App\Models\Reservation;
use App\Mail\ShopMail;


class SendReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder emails to all users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $reservations = Reservation::where('date', date("Y-m-d"))->get();
        $greet = 'ご予約当日です';
        $message = 'Reseにログインして、予約情報をご確認ください。ご来店お待ちしております。';

        foreach($reservations as $reservation) {
            $user = User::find($reservation->user_id);
            $email = $user->email;
            $shop = Shop::find($reservation->shop_id);
            $name = $shop->name;
            Mail::send(new ShopMail($email,$greet,$message,$name));
        }
    }
}
