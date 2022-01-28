<?php

declare(strict_types=1);

namespace Modules\Application\Controllers;

use Illuminate\Http\Request;

use Modules\Application\Model\Page;

class PageController extends Controller
{

    public function index(Request $request, Page $page)
    {
        $data = $page->getPage($request->input('id'));
        $data['pages'] = $this->pages($page);

        return $this->template('page', $data);
    }
}
