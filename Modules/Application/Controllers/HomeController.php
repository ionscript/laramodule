<?php

declare(strict_types=1);

namespace Modules\Application\Controllers;

use Modules\Application\Model\Page;

class HomeController extends Controller
{

    public function index(Page $page)
    {

        $data['pages'] = $this->pages($page);

        return $this->template('home', $data);
    }
}
