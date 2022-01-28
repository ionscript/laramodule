<?php

declare(strict_types=1);

namespace Modules\Account\Controllers;


class DashboardController extends Controller
{
    public function indexAction()
    {
        return $this->template('dashboard');
    }
}
