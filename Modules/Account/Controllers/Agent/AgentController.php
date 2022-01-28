<?php

declare(strict_types=1);

namespace Modules\Account\Controllers\Agent;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Modules\Account\Controllers\Controller;
use Modules\Account\Model\Agent\Agent;
use Modules\Account\Model\Agent\Group;
use Modules\Account\Model\Department;
use Modules\Account\Model\Sip;

class AgentController extends Controller
{
    private $request;
    private $agent;
    private $group;
    private $department;
    private $sip;

    public function __construct(Request $request, Agent $agent, Group $group, Department $department, Sip $sip)
    {
        $this->request = $request;
        $this->agent = $agent;
        $this->department = $department;
        $this->group = $group;
        $this->sip = $sip;
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

//        $data['ip'] = $this->request->ip();
//        $data['uuid'] = Uuid::uuid4()->toString();
        $this->agent->addAgent($data);

        return redirect(route('account.agent'))->with('success', 'Success');
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

        $this->agent->editAgent($id, $data);

        return redirect(route('account.agent'))->with('success', 'Success');
    }

    public function deleteAction()
    {
        $this->deleteValidator()->validate();

        $this->agent->deleteAgent($this->request->input('selected'));

        return redirect(route('account.agent'))->with('success', 'Success');
    }

    protected function list()
    {
        $data['agents'] = $this->agent->getAgents();

        return $this->template('agent.agent.list', $data);
    }

    protected function form()
    {
        if ($this->request->has('id')) {
            $data = $this->agent->getAgent($this->request->input('id'));
            $data['action'] = route('account.agent.update', ['id' => $this->request->input('id')]);
        } else {
            $data = [];
            $data['action'] = route('account.agent.create');
        }

        $data['departments'] = $this->department->getDepartments();
        $data['sips'] = $this->sip->getSips();
        $data['groups'] = [];

        return $this->template('agent.agent.form', $data);
    }

    public function formValidator()
    {
        return Validator::make($this->request->all(), [
            'username' => ['required', 'string', 'max:255', 'unique:agent'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:agent']
        ]);
    }

    public function passwordValidator()
    {
        return Validator::make($this->request->all(), [
            'password' => ['required', 'string', 'min:6', 'max:30', 'confirmed'],
            'password_confirmation' => ['required', 'same:password']
        ]);
    }

    public function deleteValidator()
    {
        return Validator::make($this->request->all(), [
            'selected' => ['required', 'array']
        ]);
    }
}
