<?php

declare(strict_types=1);

namespace Modules\Account\Controllers\Auth;

use Modules\Account\Controllers\Controller;
use Modules\Account\Providers\RouteServiceProvider;
use Modules\Account\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest:account')->except('logout');
    }
}
