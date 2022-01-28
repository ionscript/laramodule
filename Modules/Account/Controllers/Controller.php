<?php

declare(strict_types=1);

namespace Modules\Account\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

abstract class Controller extends BaseController
{
   use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public const ROUTE_PREFIX = 'account';


    protected function template($view, $data = [], $mergedData = [])
    {
        $theme = config('app.theme');

        $view = trim($view, " .-_/\t\n\r\0\x0B");

        return view("account::theme.$theme.$view", $data, $mergedData);
    }

    protected function guard()
    {
        return Auth::guard('account');
    }

    public function getClientIp()
    {
        if (getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
        } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('HTTP_X_FORWARDED')) {
            $ip = getenv('HTTP_X_FORWARDED');
        } elseif (getenv('HTTP_FORWARDED_FOR')) {
            $ip = getenv('HTTP_FORWARDED_FOR');
        } elseif (getenv('HTTP_FORWARDED')) {
            $ip = getenv('HTTP_FORWARDED');
        } elseif (getenv('REMOTE_ADDR')) {
            $ip = getenv('REMOTE_ADDR');
        } else {
            $ip = '0.0.0.0';
        }

        return $ip;
    }
}
