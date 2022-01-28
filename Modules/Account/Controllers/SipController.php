<?php

declare(strict_types=1);

namespace Modules\Account\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Modules\Account\Model\Agent\Agent;
use Modules\Account\Model\Sip;

class SipController extends Controller
{
    private $request;
    private $sip;
    private $agent;

    public function __construct(Request $request, Sip $sip, Agent $agent)
    {
        $this->request = $request;
        $this->sip = $sip;
        $this->agent = $agent;
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
        $this->passwordValidator()->validate();

        $data = $this->request->all();
        unset($data['password_confirmation']);

        $this->sip->addSip($data);

        return redirect(route('account.sip'))->with('success', 'Success');
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

        if($this->request->input('password')) {
            $this->passwordValidator()->validate();
            unset($data['password_confirmation']);
        }

        $this->sip->editSip($id, $data);

        return redirect(route('account.sip'))->with('success', 'Success');
    }

    public function deleteAction()
    {
        $this->deleteValidator()->validate();

        $this->sip->deleteSip($this->request->input('selected'));

        return redirect(route('account.sip'))->with('success', 'Success');
    }

    protected function list()
    {
        $data['sips'] = $this->sip->getSips();

        return $this->template('sip.list', $data);
    }

    protected function form()
    {
        if ($this->request->has('id')) {

            $data = $this->sip->getSip($this->request->input('id'));

            $data['action'] = route('account.sip.update', ['id' => $this->request->input('id')]);

        } else {
            $data = [];
            $data['default'] = false;
            $data['action'] = route('account.sip.create');
        }

        $data['agents'] = $this->agent->getAgents();

        return $this->template('sip.form', $data);
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

    public function passwordValidator()
    {
        return Validator::make($this->request->all(), [
            'password' => ['required', 'string', 'min:6', 'max:30', 'confirmed'],
            'password_confirmation' => ['required', 'same:password']
        ]);
    }
}
