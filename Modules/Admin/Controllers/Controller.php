<?php

declare(strict_types=1);

namespace Modules\Admin\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
//   use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public const ROUTE_PREFIX = 'admin';


    protected function template($view, $data = [], $mergedData = [])
    {
        $theme = config('app.theme');

        $view = trim($view, " .-_/\t\n\r\0\x0B");

        return view("admin::theme.$theme.$view", $data, $mergedData);
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
