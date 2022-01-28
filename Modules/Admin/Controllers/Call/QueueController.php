<?php

declare(strict_types=1);

namespace Modules\Admin\Controllers\Call;

use Illuminate\Http\Request;
use Modules\Admin\Controllers\Controller;
use Modules\Admin\Model\Call\Queue;


class QueueController extends Controller
{
    protected $queues;

    public function __construct(Queue $queues)
    {
        $this->queues = $queues;
    }

    public function index()
    {
        $data = [];

        $queues = $this->queues->getQueues();

        $data['items'] = $queues->items();

        return $this->template('call.queue.list', $data);
    }

    public function create(Request $request)
    {
        if ($request->getMethod() === 'POST') {

            $data = $request->all();

            $data['call_center_id'] = 9;
            $data['sid'] = 'QU6db2011538ae7da98b152782d7da30b6';

            $this->queues->addQueue($data);

            return redirect('/admin/agents')->with('success', 'Success');
        }
        $data['statuses'] = $this->queues->getStatuses();

        return $this->template('call.queue.form', $data);
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');

        $test = $request->all();

        if ($id && $request->getMethod() === 'POST') {
            $result = $this->queues->editQueue($id, $request->all());

            return redirect('/admin/queue/view')->with('success', 'Success');
        }

        $data = $this->queues->getQueue($id);
        $data['action'] = '/admin/queue/edit?id=' . $id;
        $data['statuses'] = $this->queues->getStatuses();

        return $this->template('call.queue.form', $data);
    }

    public function delete()
    {

    }
}
