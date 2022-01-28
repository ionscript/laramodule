<?php

declare(strict_types=1);

namespace Modules\Account\Controllers\Auth;

use Illuminate\Http\Request;
use Modules\Account\Controllers\Controller;
use Modules\Account\Providers\RouteServiceProvider;
use Modules\Account\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    use VerifiesEmails;

    public function verified(Request $request) {}

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
//        $this->middleware('auth:account');
        $this->middleware('signed:account')->only('verify');
        $this->middleware('throttle:account:6,1')->only('verify', 'resend');
    }
}
