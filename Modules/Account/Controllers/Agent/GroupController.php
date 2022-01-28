<?php

declare(strict_types=1);

namespace Modules\Account\Controllers\Agent;

use Illuminate\Http\Request;
use Modules\Account\Controllers\Controller;
use Modules\Account\Model\Agent\Group;

class GroupController extends Controller
{
    private $group;

    public function __construct(Group $group)
    {
        $this->group = $group;
    }

    public function indexAction()
    {
        return $this->template('agent.group.list');
    }

    public function addAction(Request $request)
    {
        if($request->getMethod() === 'POST') {
            $this->group->addGroup($request->all());

            return redirect('/account/agent/group')->with('success', 'Success');
        }

        $data = $request->all();
        $data['action'] = '/account/agent/group/add';
        $data['groups'] = $this->group->getAllGroups();

        return $this->template('agent.group.form', $data);
    }

    public function editAction(Request $request)
    {
        $id = $request->input('id');


        if($id && $request->getMethod() === 'POST') {
            $this->group->editGroup($id, $request->all());

            return redirect('/account/agent/group')->with('success', 'Success');
        }

        $data = $this->group->getGroup($id);
        $data['action'] = '/account/agent/group/edit?id='. $id;
        $data['groups'] = $this->group->getAllGroups();

        return $this->template('agent.group.form', $data);
    }

    public function deleteAction(Request $request)
    {
        $id = $request->input('id');

        if($id) {
            $this->group->deleteGroup($id);
        }

        return redirect('/account/agent/group')->with('success', 'Success');
    }
}
