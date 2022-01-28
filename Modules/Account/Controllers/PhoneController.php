<?php

declare(strict_types=1);

namespace Modules\Account\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Modules\Account\Model\Department;
use Modules\Account\Model\Phone;

class PhoneController extends Controller
{
    private $request;
    private $phone;
    private $department;

    public function __construct(Request $request, Phone $phone, Department $department)
    {
        $this->request = $request;
        $this->phone = $phone;
        $this->department = $department;
    }

    public function indexAction()
    {
        return $this->list();
    }

    public function addAction()
    {
        return $this->form();
    }

    public function createAction()
    {
        $this->formValidator()->validate();

        $data = $this->request->all();
        $data['sid'] = '';
        $data['type'] = '';
        $data['mode'] = $data['mode'] ?? 'voice';
        $data['emergency_status'] = $data['emergency_status'] ?? 'Inactive';

        $this->phone->addPhone($data);

        return redirect(route('account.phone'))->with('success', 'Success');
    }

    public function editAction()
    {
        return $this->form();
    }

    public function updateAction()
    {
        $this->formValidator()->validate();

        $id = $this->request->input('id');
        $data = $this->request->all();
        $data['sid'] = '';
        $data['type'] = '';
        $data['mode'] = $data['mode'] ?? 'voice';
        $data['emergency_status'] = $data['emergency_status'] ?? 'Inactive';
        $this->phone->editPhone($id, $data);

        return redirect(route('account.phone'))->with('success', 'Success');
    }

    public function deleteAction()
    {
        $this->deleteValidator()->validate();

        $this->phone->deletePhone($this->request->input('selected'));

        return redirect(route('account.phone'))->with('success', 'Success');
    }

    protected function list()
    {
        $data['phones'] = $this->phone->getPhones();

        return $this->template('phone.list', $data);
    }

    protected function form()
    {
        if ($this->request->has('id')) {

            $data = $this->phone->getPhone($this->request->input('id'));

            if ($data['department_id']) {
                $department = $this->department->getDepartment($data['department_id']);
                $data['default'] = $data['id'] === $department->phone_id;
            } else {
                $data['default'] = false;
            }

            $data['action'] = route('account.phone.update', ['id' => $this->request->input('id')]);
        } else {
            $data = [];
            $data['default'] = false;
            $data['action'] = route('account.phone.create');
        }

        $data['departments'] = $this->department->getDepartments();

        return $this->template('phone.form', $data);
    }

    public function formValidator()
    {
        return Validator::make($this->request->all(), [
            'name' => ['required', 'string', 'max:32'],
            'number' => ['required', 'string', 'max:255']
        ]);
    }

    public function deleteValidator()
    {
        return Validator::make($this->request->all(), [
            'selected' => ['required', 'array']
        ]);
    }
}
