<?php

declare(strict_types=1);

namespace Modules\Admin\Controllers\CallCenter;

use Illuminate\Http\Request;
use Modules\Admin\Controllers\Controller;
use Modules\Admin\Model\CallCenter\PhoneNumber;


class PhoneNumberController extends Controller
{
    private $phoneNumbers;

    public function __construct(PhoneNumber $phoneNumber)
    {
        $this->phoneNumbers = $phoneNumber;
    }

    public function index(Request $request)
    {
        $data = [];

        $phoneNumbers = $this->phoneNumbers->getPhoneNumbers(32);

        $data['items'] = $phoneNumbers->items();
        $data['number_types'] = $this->phoneNumbers->getTypes();

        return $this->template('callcenter.phone-number.list', $data);
    }
}
