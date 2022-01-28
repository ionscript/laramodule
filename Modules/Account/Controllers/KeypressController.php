<?php

declare(strict_types=1);

namespace Modules\Account\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Modules\Account\Model\Keypress;

class KeypressController extends Controller
{
    private $request;
    private $keypress;

    public function __construct(Request $request, Keypress $keypress)
    {
        $this->request = $request;
        $this->keypress = $keypress;
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

        $this->keypress->addKeypress($data);

        return redirect(route('account.keypress'))->with('success', 'Success');
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

        $this->keypress->editKeypress($id, $data);

        return redirect(route('account.keypress'))->with('success', 'Success');
    }

    public function deleteAction()
    {
        $this->deleteValidator()->validate();

        $this->keypress->deleteKeypress($this->request->input('selected'));

        return redirect(route('account.keypress'))->with('success', 'Success');
    }

    protected function list()
    {
        $data['keypresses'] = $this->keypress->getKeypresses();

        return $this->template('keypress.list', $data);
    }

    protected function form()
    {
        if ($this->request->has('id')) {

            $data = $this->keypress->getKeypress($this->request->input('id'));

            $data['action'] = route('account.keypress.update', ['id' => $this->request->input('id')]);

        } else {
            $data = [];
            $data['default'] = false;
            $data['action'] = route('account.keypress.create');
        }

        return $this->template('keypress.form', $data);
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
