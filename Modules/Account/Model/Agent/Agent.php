<?php

declare(strict_types=1);

namespace Modules\Account\Model\Agent;


use Modules\Account\Model\Eloquent;
use Illuminate\Support\Facades\Hash;


class Agent extends Eloquent
{
    protected $table = 'agent';

    protected $fillable = [
        'call_center_id',
        'department_id',
        'group_id',
        'sip_id',
        'username',
        'password',
        'remember_token',
        'firstname',
        'lastname',
        'description',
        'email',
        'image',
        'ip',
        'status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAgent($id)
    {
        return $this->find($id);
    }

    public function addAgent($data)
    {
        $data['call_center_id'] = $this->getCallCenterId();
        $data['password'] = Hash::make($data['password']);

        return $this->insert($data);
    }

    public function editAgent($id, $data)
    {
        $data['call_center_id'] = $this->getCallCenterId();
        $password = $data['password'];

        unset($data['password']);

        $this->where('id', $id)->update($data);

        if ($password) {
            $this->where('id', $id)->update([
                'password' => Hash::make($password)
            ]);
        }
    }

    public function deleteAgent($id)
    {
        $this->where('id', $id)->delete();
    }

    public function editPassword($id, $password)
    {
        $this->where('id', $id)->update([
            'password' => Hash::make($password)
        ]);
    }

    public function getAgentByUsername($agentname)
    {
        return $this->where('username', $agentname)->first();
    }

    public function getAgentByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function getAgents($limit = 20)
    {
        return $this->where('call_center_id', $this->getCallCenterId())->paginate($limit);
    }

    public function getAgentsLikeName($name, $limit = 5)
    {
        return  $this->where([
            ['call_center_id', '=', $this->getCallCenterId()],
            ['username', 'LIKE', "%$name%"],
        ])->paginate($limit);
    }
}
