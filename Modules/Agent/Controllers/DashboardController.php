<?php

declare(strict_types=1);

namespace Modules\Agent\Controllers;


class DashboardController extends Controller
{
    public function indexAction()
    {
        return $this->template('dashboard');
    }
}
