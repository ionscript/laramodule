<?php

declare(strict_types=1);

namespace Modules\Account\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Modules\Account\Model\Department;
use Modules\Account\Model\Office;
use Modules\Account\Model\Address;

class OfficeController extends Controller
{
    private $request;
    private $address;
    private $office;
    private $department;

    public function __construct(Request $request, Address $address, Office $office, Department $department)
    {
        $this->request = $request;
        $this->address = $address;
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

        $this->office->addOffice($data);

        return redirect(route('account.office'))->with('success', 'Success');
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

        $this->office->editOffice($id, $data);

        return redirect(route('account.office'))->with('success', 'Success');
    }

    public function deleteAction()
    {
        $this->deleteValidator()->validate();

        $this->office->deleteOffice($this->request->input('selected'));

        return redirect(route('account.office'))->with('success', 'Success');
    }

    protected function list()
    {
        $data['offices'] = $this->office->getOffices();

        return $this->template('office.list', $data);
    }

    protected function form()
    {
        if ($this->request->has('id')) {

            $data['office'] = $this->office->getOffice($this->request->input('id'));

            $data['default'] = $data['office']['id'] === $this->guard()->user()->callcenter()->office_id;
            $data['action'] = route('account.office.update', ['id' => $this->request->input('id')]);
            $data['departments']  = $this->department->getDepartmentsByOfficeId($this->request->input('id'));
        } else {
            $data = [];
            $data['default'] = false;
            $data['action'] = route('account.office.create');
            $data['departments']  = [];
            $data['office']  = [];
        }

        $data['addresses'] = $this->address->getAddresses();

        return $this->template('office.form', $data);
    }

    public function formValidator()
    {
        return Validator::make($this->request->input('office'), [
            'name' => ['required', 'string', 'max:32']
        ]);
    }

    public function deleteValidator()
    {
        return Validator::make($this->request->all(), [
            'selected' => ['required', 'array']
        ]);
    }

    public function autocompleteAjax(Request $request)
    {
        $json = [];

        if ($request->has('name')) {

            $results = $this->department->getDepartmentsLikeName($request->input('name'));

            foreach ($results as $result) {
                $json[] = [
                    'name' => $result->id,
                    'value' => strip_tags(html_entity_decode($result->name, ENT_QUOTES, 'UTF-8'))
                ];
            }
        }

        $sort_order = [];

        foreach ($json as $key => $value) {
            $sort_order[$key] = $value['value'];
        }

        array_multisort($sort_order, SORT_ASC, $json);
        return response()->json($json);
    }
}
