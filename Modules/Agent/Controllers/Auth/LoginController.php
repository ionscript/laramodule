<?php

declare(strict_types=1);

namespace Modules\Agent\Controllers\Auth;

use Modules\Agent\Controllers\Controller;
use Modules\Agent\Providers\RouteServiceProvider;
use Modules\Agent\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest:agent')->except('logout');
    }
}
