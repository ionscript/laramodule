<?php

declare(strict_types=1);

namespace Modules\Admin\Controllers;

use Frontoffice\Twilio\Api\Accounts\AccountsInterface as Accounts;
use Frontoffice\Twilio\Api\PhoneNumbers\IncomingPhoneNumbersInterface as IncomingPhoneNumbers;

class DashboardController extends Controller
{

    public function index(Accounts $accounts, IncomingPhoneNumbers $incomingPhoneNumbers)
    {

        event('call.before', 'created');
        return $this->template('dashboard');
    }
}
