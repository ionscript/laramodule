<?php

declare(strict_types=1);

namespace Modules\Account\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Modules\Account\Auth\Notifications\CongratulationEmail;
use Modules\Account\Auth\Notifications\VerifyEmail;


abstract class AuthenticatableModel extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail;

    public const CREATED_AT = 'created_at';

    public const UPDATED_AT = 'updated_at';

    public $timestamps = false;

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail());
    }

    public function sendEmailCongratulationNotification()
    {
        $this->notify(new CongratulationEmail());
    }
}
