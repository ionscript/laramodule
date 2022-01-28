<?php

declare(strict_types=1);

namespace Modules\Account\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Modules\Account\Model\Flow;

class FlowController extends Controller
{
    private $request;
    private $flow;

    public function __construct(Request $request, Flow $flow)
    {
        $this->request = $request;
        $this->flow = $flow;
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

        $this->flow->addFlow($data);

        return redirect(route('account.flow'))->with('success', 'Success');
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

        $this->flow->editFlow($id, $data);

        return redirect(route('account.flow'))->with('success', 'Success');
    }

    public function deleteAction()
    {
        $this->deleteValidator()->validate();

        $this->flow->deleteFlow($this->request->input('selected'));

        return redirect(route('account.flow'))->with('success', 'Success');
    }

    protected function list()
    {
        $data['flows'] = $this->flow->getFlows();

        return $this->template('flow.list', $data);
    }

    protected function form()
    {
        if ($this->request->has('id')) {

            $data = $this->flow->getFlow($this->request->input('id'));

            $data['action'] = route('account.flow.update', ['id' => $this->request->input('id')]);

        } else {
            $data = [];
            $data['default'] = false;
            $data['action'] = route('account.flow.create');
        }

        return $this->template('flow.form', $data);
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
