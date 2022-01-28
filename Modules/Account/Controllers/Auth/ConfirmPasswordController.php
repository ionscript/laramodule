<?php

namespace Modules\Account\Controllers\Auth;

use Modules\Account\Providers\RouteServiceProvider;
use Modules\Account\Auth\ConfirmsPasswords;
use Modules\Account\Controllers\Controller;

class ConfirmPasswordController extends Controller
{
    use ConfirmsPasswords;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('auth:account');
    }
}
