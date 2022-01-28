<?php

declare(strict_types=1);

namespace Modules\Account\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Modules\Account\Model\Department;
use Modules\Account\Model\Office;
use Modules\Account\Model\Phone;

class DepartmentController extends Controller
{
    private $request;
    private $phone;
    private $office;
    private $department;

    public function __construct(Request $request, Phone $phone, Office $office, Department $department)
    {
        $this->request = $request;
        $this->phone = $phone;
        $this->office = $office;
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

        $this->department->addDepartment($data);

        return redirect(route('account.department'))->with('success', 'Success');
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

        $this->department->editDepartment($id, $data);

        return redirect(route('account.department'))->with('success', 'Success');
    }

    public function deleteAction()
    {
        $this->deleteValidator()->validate();

        $this->department->deleteDepartment($this->request->input('selected'));

        return redirect(route('account.department'))->with('success', 'Success');
    }

    protected function list()
    {
        $data['departments'] = $this->department->getDepartments();

        return $this->template('department.list', $data);
    }

    protected function form()
    {
        if ($this->request->has('id')) {

            $data = $this->department->getDepartment($this->request->input('id'));

            $data['default'] = $data['id'] === $this->guard()->user()->callcenter()->department_id;
            $data['action'] = route('account.department.update', ['id' => $this->request->input('id')]);
        } else {
            $data = [];
            $data['default'] = false;
            $data['action'] = route('account.department.create');
        }

        $data['phones'] = $this->phone->getPhones();
        $data['offices'] = $this->office->getOffices();

        return $this->template('department.form', $data);
    }

    public function formValidator()
    {
        return Validator::make($this->request->all(), [
            'name' => ['required', 'string', 'max:32']
        ]);
    }

    public function deleteValidator()
    {
        return Validator::make($this->request->all(), [
            'selected' => ['required', 'array']
        ]);
    }
}
