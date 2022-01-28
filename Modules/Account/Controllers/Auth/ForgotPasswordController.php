<?php

namespace Modules\Account\Controllers\Auth;

use Modules\Account\Auth\SendsPasswordResetEmails;
use Modules\Account\Controllers\Controller;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;
}
