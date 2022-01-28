<?php

declare(strict_types=1);

namespace Modules\Api\Controllers\Twilio;

use Frontoffice\Twilio\Api\Sms\MessagesInterface as Messages;
use Illuminate\Http\Request;
use Modules\Api\Controllers\Controller;


class MessageController extends Controller
{
    private $messages;

    public function __construct(Messages $messages)
    {
        $this->messages = $messages;
    }

    public function indexAction()
    {

    }

    public function statusAction()
    {

    }

    public function fallAction()
    {

    }
}
