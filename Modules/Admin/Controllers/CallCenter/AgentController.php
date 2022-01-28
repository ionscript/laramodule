<?php

declare(strict_types=1);

namespace Modules\Admin\Controllers\CallCenter;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Controllers\Controller;
use Modules\Admin\Model\CallCenter\Agent;

class AgentController extends Controller
{
    protected $agent;

    protected $avatar_backgrounds = [
        '#556ee6', '#4fa7c1', '#c54747', '#c838e2', '#609461'
    ];

    public function __construct(Agent $agent)
    {
        $this->agent = $agent;
    }

    public function index()
    {
        $data = [];

        $data['agents'] = $this->agent->getAgents(3)->items();

        return $this->template('callcenter.agent.list', $data);
    }

    public function create(Request $request)
    {
        if ($request->getMethod() === 'POST') {

            $data = $request->all();

            $agent = $request->get('agent');
            $agent['agent_hash'] = Hash::make($agent['email'].$agent['web_username']);
            $agent['online_status_id'] = 5;

            if (empty($agent['avatar_name'])) {
                $agent['avatar_name'] = $this->avatar_backgrounds[array_rand($this->avatar_backgrounds)];
            }

            $agent['call_center_id'] = 3;

            $this->agent->addAgent($agent);

            return redirect('/admin/agent')->with('success', 'Success');
        }

        return $this->template('callcenter.agent.form');
    }
}
