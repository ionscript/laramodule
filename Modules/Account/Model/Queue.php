<?php

declare(strict_types=1);

namespace Modules\Account\Model;


class Queue extends Eloquent
{
    protected $table = 'queue';

    protected $fillable = [
        'call_center_id',
        'sid',
        'name',
        'description'
    ];

    public function getQueue($id)
    {
        return $this->find($id);
    }

    public function addQueue($data)
    {
        $data['queue']['call_center_id'] = $this->getCallCenterId();;

        $id = $this->insertGetId($data['queue']);

        if ($data['agent']) {
            $agents = [];

            foreach ($data['agent'] as $agent_id) {
                $agents += [
                    'queue_id' => $id,
                    'agent_id' => $agent_id
                ];
            }

            $this->getConnection()->table('agent_to_queue')->insert($agents);
        }

        return true;
    }

    public function editQueue($id, $data)
    {
        $data['queue']['call_center_id'] = $this->getCallCenterId();;

        $this->where('id', $id)->update($data['queue']);

        if ($data['agent']) {
            $agents = [];

            foreach ($data['agent'] as $agent_id) {
                $agents += [
                    'queue_id' => $id,
                    'agent_id' => $agent_id
                ];
            }

            $this->getConnection()->table('agent_to_queue')->where('queue_id', $id)->delete();
            $this->getConnection()->table('agent_to_queue')->insert($agents);
        }

        return true;
    }

    public function deleteQueue(array $ids)
    {
        $this->getConnection()->table('agent_to_queue')->where('queue_id', $ids)->delete();

        $this->where('id', $ids)->delete();

        return true;
    }

    public function getQueues($limit = 20)
    {
        return $this->where('call_center_id', $this->getCallCenterId())->paginate($limit);
    }

    public function getQueueAgents($queue_id, $limit = 20)
    {
        return $this->getConnection()
            ->table('agent_to_queue')
            ->where('queue_id', $queue_id)
            ->leftJoin('agent', 'agent.id', '=', 'agent_id')
            ->get();
    }


//    public function setDefault()
//    {
//        $callcenter = $this->belongsTo(Office::class)->first();
//        $callcenter->address_id = $this->id;
//        $callcenter->save();
//    }
}
