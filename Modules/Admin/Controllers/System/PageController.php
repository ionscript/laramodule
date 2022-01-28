<?php

declare(strict_types=1);

namespace Modules\Admin\Controllers\System;

use Illuminate\Http\Request;
use Modules\Admin\Controllers\Controller;
use Modules\Admin\Model\System\Page;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    private $page;

    public function __construct(Page $page)
    {
        $this->middleware('auth:admin');
        $this->page = $page;
    }

    public function index(Request $request)
    {
        $user = Auth::user();

        $data['pages'] = $this->page->getPages();

        return $this->template('page.list', $data);
    }

    public function create(Request $request)
    {
        if($request->getMethod() === 'POST') {
            $this->page->addPage($request->all());

            return redirect('/admin/page')->with('success', 'Success');
        }

        $data = $request->all();
        $data['action'] = '/admin/page/add';

        return $this->template('page.form', $data);
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');


        if($id && $request->getMethod() === 'POST') {
            $this->page->editPage($id, $request->all());

            return redirect('/admin/page')->with('success', 'Success');
        }

        $data = $this->page->getPage($id);
        $data['action'] = '/admin/page/edit?id='. $id;

        return $this->template('page.form', $data);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');

        if($id) {
            $this->page->deletePage($id);
        }

        return redirect('/admin/page')->with('success', 'Success');
    }
}
