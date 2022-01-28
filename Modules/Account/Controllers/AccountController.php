<?php

declare(strict_types=1);

namespace Modules\Account\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Account\Model\Account\Customer;

class AccountController extends Controller
{
    public function indexAction(Request $request)
    {
        if($customer = Auth::getUser()) {
            $data['customer'] = $customer;
            $data['call_center'] = $customer->callCenter;
        }

        return $this->template('account.form', []);
    }

    public function editAction(Request $request)
    {
        $id = $request->input('id');
        $data = $request->all();

        $this->customer->editAccount($id, $data);

        return redirect(route('account'));
    }
}
