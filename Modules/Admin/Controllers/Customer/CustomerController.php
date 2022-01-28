<?php

declare(strict_types=1);

namespace Modules\Admin\Controllers\Customer;


use Illuminate\Http\Request;
use Modules\Admin\Controllers\Controller;
use Modules\Admin\Model\Customer\Customer;

class CustomerController extends Controller
{
    private $customer;
    private $group;

    public function __construct(Customer $customer)
    {
        $this->middleware('auth:admin');
        $this->customer = $customer;
    }

    public function index(Request $request)
    {
        $data['customers'] = $this->customer->getCustomers();

        return $this->template('customer.list', $data);
    }

    public function create(Request $request)
    {
        if($request->getMethod() === 'POST') {

            $data = $request->all();
            $data['ip'] = $request->server('REMOTE_ADDR');

            $this->customer->addCustomer($data);

            return redirect('/admin/customer')->with('success', 'Success');
        }

        $data = $request->all();
        $data['action'] = '/admin/customer/add';
//        $data['groups'] = $this->group->getAllGroups();

        return $this->template('customer.form', $data);
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');


        if($id && $request->getMethod() === 'POST') {
            $this->customer->editCustomer($id, $request->all());

            return redirect('/admin/customer')->with('success', 'Success');
        }

        $data = $this->customer->getCustomer($id);
        $data['action'] = '/admin/customer/edit?id='. $id;
//        $data['groups'] = $this->group->getAllGroups();

        return $this->template('customer.form', $data);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');

        if($id) {
            $this->customer->deleteCustomer($id);
        }

        return redirect('/admin/customer')->with('success', 'Success');
    }
}
