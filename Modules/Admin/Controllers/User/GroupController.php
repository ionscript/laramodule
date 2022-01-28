<?php

declare(strict_types=1);

namespace Modules\Admin\Controllers\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Admin\Controllers\Controller;
use Modules\Admin\Model\User\Group;

class GroupController extends Controller
{
    private $group;

    public function __construct(Group $group)
    {
        $this->middleware('auth:admin');
        $this->group = $group;
    }

    public function index(Request $request)
    {
        $data['groups'] = $this->group->getGroups();

        return $this->template('user.group.list', $data);
    }

    public function create(Request $request)
    {
        $this->validate($request);

        if($request->getMethod() === 'POST') {

            $data = $request->all();

            $data['permission']['access'] = $data['permission']['access'] ?? [];
            $data['permission']['modify'] = $data['permission']['access'] ?? [];

            $this->group->addGroup($data);

            return redirect(route('user-group'))->with('status', 'Success');
        }

        $data = $request->all();
        $data['action'] = '/admin/user/group/add';
        $permissions = [];

        foreach (Route::getRoutes()->getRoutesByName() as $name => $route) {
            if($route->action['prefix'] === static::ROUTE_PREFIX) {

                $parts = explode('.', $name);

                if(count($parts) !== 1) {
                    continue;
                }

                $name = $parts[0];

                $permissions[] = $name;
            }
        }

        $data['permissions'] = $permissions;
        $data['access'] = [];
        $data['modify'] = [];

        return $this->template('user.group.form', $data);
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');


        if($id && $request->getMethod() === 'POST') {

            $data = $request->all();

            $data['permission']['access'] = $data['permission']['access'] ?? [];
            $data['permission']['modify'] = $data['permission']['access'] ?? [];

            $this->group->editGroup($id, $data);

            return redirect('/admin/user/group')->with('status', 'Success');
        }

        $data = $this->group->getGroup($id);
        $data['action'] = '/admin/user/group/edit?id='. $id;

        $permissions = [];

        foreach (Route::getRoutes()->getRoutesByName() as $name => $route) {
            if($route->action['prefix'] === static::ROUTE_PREFIX) {

                $parts = explode('.', $name);

                if(count($parts) !== 1) {
                    continue;
                }

                $name = $parts[0];

                $permissions[] = $name;
            }
        }

        $data['permissions'] = $permissions;
        $data['access'] = $data['permission']['access'];
        $data['modify'] = $data['permission']['modify'];

        return $this->template('user.group.form', $data);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');


        if($id) {
            $this->group->deleteGroup($id);
        }

        return redirect('/admin/user/group')->with('status', 'Success');
    }

    protected function validate(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
    }
}
