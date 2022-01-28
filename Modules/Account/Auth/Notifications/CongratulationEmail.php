<?php
declare(strict_types=1);

namespace Modules\Account\Auth\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CongratulationEmail extends Notification
{
    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Congratulations!')
            ->line('Welcome to Frontoffice.')
            ->action('Log in', route('account.login'));
    }
}
