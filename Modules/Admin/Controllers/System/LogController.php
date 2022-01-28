<?php

declare(strict_types=1);

namespace Modules\Admin\Controllers\System;

use Illuminate\Support\Facades\File;
use Modules\Admin\Controllers\Controller;

class LogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $data['log'] = '';

        $file = storage_path('logs/laravel.log');

        if (File::exists($file)) {
            $data['log'] = File::get(storage_path('logs/laravel.log'));
        }

        return $this->template('system.log', $data);
    }

    public function clear()
    {
        $file = storage_path('logs/laravel.log');

        if (File::exists($file)) {
            File::put($file, '');
        }

        return redirect(route('log'));
    }

    public function download()
    {
        $file = storage_path('logs/laravel.log');

        if(File::exists($file) && File::size($file) > 0) {
            return response()->download($file, date('Y-m-d_H-i-s') . '_laravel.log');
        }

        return redirect(route('log'));
    }
}
