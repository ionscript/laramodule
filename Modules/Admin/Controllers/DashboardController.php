<?php

declare(strict_types=1);

namespace Modules\Admin\Controllers;


class DashboardController extends Controller
{

    public function index()
    {

        event('call.before', 'created');
        return $this->template('dashboard');
    }
}
