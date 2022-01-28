<?php

declare(strict_types=1);

namespace Modules\Account\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Modules\Account\Model\Extension;
use Modules\Account\Model\Phone;

class ExtensionController extends Controller
{
    private $request;
    private $phone;
    private $extension;

    public function __construct(Request $request, Phone $phone, Extension $extension)
    {
        $this->request = $request;
        $this->phone = $phone;
        $this->extension = $extension;
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

        $this->extension->addExtension($data);

        return redirect(route('account.extension'))->with('success', 'Success');
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
        $this->extension->editExtension($id, $data);

        return redirect(route('account.extension'))->with('success', 'Success');
    }

    public function deleteAction()
    {
        $this->deleteValidator()->validate();

        $this->extension->deleteExtension($this->request->input('selected'));

        return redirect(route('account.extension'))->with('success', 'Success');
    }

    protected function list()
    {
        $data['extensions'] = $this->extension->getExtensions();

        return $this->template('extension.list', $data);
    }

    protected function form()
    {
        if ($this->request->has('id')) {

            $data = $this->extension->getExtension($this->request->input('id'));

            if ($data['phone_id']) {
                $phone = $this->phone->getPhone($data['phone_id']);
                $data['default'] = $data['id'] === $phone->extension_id;
            } else {
                $data['default'] = false;
            }

            $data['action'] = route('account.extension.update', ['id' => $this->request->input('id')]);
        } else {
            $data = [];
            $data['default'] = false;
            $data['action'] = route('account.extension.create');
        }

        $data['phones'] = $this->phone->getPhones();

        return $this->template('extension.form', $data);
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
