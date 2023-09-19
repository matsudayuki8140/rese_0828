<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // 認証メールカスタマイズ
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
        return (new MailMessage)
            ->greeting('Reseをご利用いただきありがとうございます。')
            ->subject('Rese 認証メール')
            ->line('ボタンをクリックして、会員登録を完了してください。')
            ->action('Reseを開く', $url)
            ->salutation('Rese');
        });

        // 管理者ユーザー
        Gate::define('admin', function(User $user) {
            return ($user->role->role === 3);
        });

        // 店舗代表ユーザー
        Gate::define('representative', function(User $user) {
            return ($user->role->role === 2);
        });

        // 一般ユーザー
        Gate::define('general', function(User $user) {
            return ($user->role->role === 1);
        });
    }
}
