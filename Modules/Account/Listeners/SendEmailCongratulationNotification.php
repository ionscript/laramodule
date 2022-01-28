<?php

declare(strict_types=1);

namespace Modules\Account\Listeners;


use Illuminate\Auth\Events\Verified;

class SendEmailCongratulationNotification
{
    public function handle(Verified $event)
    {
        $event->user->sendEmailCongratulationNotification();
    }
}
