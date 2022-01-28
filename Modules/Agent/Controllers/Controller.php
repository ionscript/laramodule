<?php

declare(strict_types=1);

namespace Modules\Agent\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

abstract class Controller extends BaseController
{
    public const ROUTE_PREFIX = 'agent';

    protected function template($view, $data = [], $mergedData = [])
    {
        $theme = config('app.theme');

        $view = trim($view, " .-_/\t\n\r\0\x0B");

        return view("agent::theme.$theme.$view", $data, $mergedData);
    }

    protected function guard()
    {
        return Auth::guard('agent');
    }
}
