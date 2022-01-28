<?php

declare(strict_types=1);

namespace Modules\Account\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Modules\Account\Model\Submenu;

class SubmenuController extends Controller
{
    private $request;
    private $submenu;

    public function __construct(Request $request, Submenu $submenu)
    {
        $this->request = $request;
        $this->submenu = $submenu;
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

        $this->submenu->addSubmenu($data);

        return redirect(route('account.submenu'))->with('success', 'Success');
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

        $this->submenu->editSubmenu($id, $data);

        return redirect(route('account.submenu'))->with('success', 'Success');
    }

    public function deleteAction()
    {
        $this->deleteValidator()->validate();

        $this->submenu->deleteSubmenu($this->request->input('selected'));

        return redirect(route('account.submenu'))->with('success', 'Success');
    }

    protected function list()
    {
        $data['submenus'] = $this->submenu->getSubmenus();

        return $this->template('submenu.list', $data);
    }

    protected function form()
    {
        if ($this->request->has('id')) {

            $data = $this->submenu->getSubmenu($this->request->input('id'));

            $data['action'] = route('account.submenu.update', ['id' => $this->request->input('id')]);

        } else {
            $data = [];
            $data['default'] = false;
            $data['action'] = route('account.submenu.create');
        }

        return $this->template('submenu.form', $data);
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
