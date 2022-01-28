<?php

declare(strict_types=1);

namespace Modules\Application\Controllers;

use Illuminate\Routing\Controller as BaseController;


abstract class Controller extends BaseController
{
    protected function template($view, $data = [], $mergedData = [])
    {
        $theme = config('app.theme');

        $view = trim($view, " .-_/\t\n\r\0\x0B");

        return view("application::theme.$theme.$view", $data, $mergedData);
    }

    protected function pages($page)
    {
        return [
            'top' => $page->getTopPages(),
            'bottom' => $page->getBottomPages()
        ];
    }
}
