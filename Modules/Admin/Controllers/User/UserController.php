<?php

declare(strict_types=1);

namespace Modules\Admin\Controllers\User;


use Illuminate\Http\Request;
use Modules\Admin\Controllers\Controller;
use Modules\Admin\Model\User\Group;
use Modules\Admin\Model\User\User;

class UserController extends Controller
{
    private $user;
    private $group;

    public function __construct(User $user, Group $group)
    {
        $this->middleware('auth:admin');
        $this->user = $user;
        $this->group = $group;
    }

    public function index(Request $request)
    {
        $data['users'] = $this->user->getUsers();

        return $this->template('user.user.list', $data);
    }

    public function create(Request $request)
    {
        if($request->getMethod() === 'POST') {

            $data = $request->all();
            $data['ip'] = $request->server('REMOTE_ADDR');

            $this->user->addUser($data);

            return redirect('/admin/user')->with('success', 'Success');
        }

        $data = $request->all();
        $data['action'] = '/admin/user/add';
        $data['groups'] = $this->group->getAllGroups();

        return $this->template('user.user.form', $data);
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');


        if($id && $request->getMethod() === 'POST') {
            $this->user->editUser($id, $request->all());

            return redirect('/admin/user')->with('success', 'Success');
        }

        $data = $this->user->getUser($id);
        $data['action'] = '/admin/user/edit?id='. $id;
        $data['groups'] = $this->group->getAllGroups();

        return $this->template('user.user.form', $data);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');

        if($id) {
            $this->user->deleteUser($id);
        }

        return redirect('/admin/user')->with('success', 'Success');
    }
}
