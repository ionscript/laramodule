<?php

declare(strict_types=1);

namespace Modules\Api\Controllers\Twilio;

use Frontoffice\Twilio\Api\Voice\CallsInterface as Calls;
use Illuminate\Http\Request;
use Modules\Api\Controllers\Controller;


class VoiceController extends Controller
{
    private $calls;

    public function __construct(Calls $calls)
    {
        $this->calls = $calls;
    }

    public function indexAction(Request $request)
    {
//        $request = $request;
//        $response = $this->calls->response();
        $response = $this->calls->say('Hello Vasya');

        info(var_export(get_loaded_extensions(), true));

        return response($response)
            ->header('Content-Type', 'text/xml');
    }

    public function statusAction(Request $request)
    {
        $data=$request->all();
        $r=$request;
    }

    public function fallAction(Request $request)
    {
        $data=$request->all();
        $r=$request;
    }
}
