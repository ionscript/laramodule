<?php

declare(strict_types=1);

namespace Modules\Admin\Controllers\Auth;


use Modules\Admin\Controllers\Controller;
use Modules\Admin\Providers\RouteServiceProvider;
use Modules\Admin\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
}
