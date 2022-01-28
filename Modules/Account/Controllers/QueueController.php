<?php

declare(strict_types=1);

namespace Modules\Account\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Modules\Account\Model\Agent\Agent;
use Modules\Account\Model\Queue;

class QueueController extends Controller
{
    private $request;
    private $queue;
    private $agent;

    public function __construct(Request $request, Queue $queue, Agent $agent)
    {
        $this->request = $request;
        $this->queue = $queue;
        $this->agent = $agent;
    }

    public function indexAction()
    {
        return $this->list();
    }

    public function addAction()
    {
        return $this->form();
    }

    public function createAction()
    {
        $this->formValidator()->validate();

        $data = $this->request->all();

        $this->queue->addQueue($data);

        return redirect(route('account.queue'))->with('success', 'Success');
    }

    public function editAction()
    {
        return $this->form();
    }

    public function updateAction()
    {
        $this->formValidator()->validate();

        $id = $this->request->input('id');
        $data = $this->request->all();

        $this->queue->editQueue($id, $data);

        return redirect(route('account.queue'))->with('success', 'Success');
    }

    public function deleteAction()
    {
        $this->deleteValidator()->validate();

        $this->queue->deleteQueue($this->request->input('selected'));

        return redirect(route('account.queue'))->with('success', 'Success');
    }

    protected function list()
    {
        $data['queues'] = $this->queue->getQueues();

        return $this->template('queue.list', $data);
    }

    protected function form()
    {
        if ($id = $this->request->has('id')) {

            $data['queue'] = $this->queue->getQueue($id);

            $data['action'] = route('account.queue.update', ['id' => $id]);
            $data['agents'] = $this->queue->getQueueAgents($id);
        } else {
            $data['queue'] = [];
            $data['default'] = false;
            $data['action'] = route('account.queue.create');
            $data['agents'] = [];
        }

        return $this->template('queue.form', $data);
    }

    public function formValidator()
    {
        return Validator::make($this->request->input('queue'), [
            'name' => ['required', 'string', 'max:32']
        ]);
    }

    public function deleteValidator()
    {
        return Validator::make($this->request->all(), [
            'selected' => ['required', 'array']
        ]);
    }

    public function autocompleteAjax(Request $request)
    {
        $json = [];

        if ($request->has('name')) {

            $results = $this->agent->getAgentsLikeName($request->input('name'));

            foreach ($results as $result) {
                $json[] = [
                    'name' => $result->id,
                    'value' => strip_tags(html_entity_decode($result->username, ENT_QUOTES, 'UTF-8'))
                ];
            }
        }

        $sort_order = [];

        foreach ($json as $key => $value) {
            $sort_order[$key] = $value['value'];
        }

        array_multisort($sort_order, SORT_ASC, $json);
        return response()->json($json);
    }
}
