<?php

declare(strict_types=1);

namespace Modules\Account\Controllers\Auth;

use Modules\Account\Controllers\Controller;
use Modules\Account\Providers\RouteServiceProvider;
use Modules\Account\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = RouteServiceProvider::HOME;
}
