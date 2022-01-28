<?php

declare(strict_types=1);

namespace Modules\Admin\Model\Call;

use Modules\Admin\Model\Eloquent;

class Queue  extends Eloquent
{
    protected $table = 'queues_new';

    protected const QUEUE_STATUSES = [
        'queue_calls_destination' => [
            1 => [
                'code' => 'everyone',
                'name' => 'Everyone'
            ],

            2 => [
                'code' => 'online',
                'name' => 'Online Users'
            ]
        ],

        'queue_agents_priority_types' => [
            1 => [
                'code' => 'default',
                'name' => 'Default agents priority'
            ],

            2 => [
                'code' => 'custom',
                'name' => 'Custom agents priority'
            ]
        ],

        'priority' => [
            1 => [
                'code' => 'high',
                'name' => 'High'
            ],

            2 => [
                'code' => 'medium',
                'name' => 'Medium'
            ],

            3 => [
                'code' => 'low',
                'name' => 'Low'
            ]
        ],

        'queue_timeout_types' => [
            1 => [
                'code' => 'unlimited',
                'name' => 'Unlimited queue time'
            ],

            2 => [
                'code' => 'timer',
                'name' => 'Go to voicemail on timer'
            ],

            3 => [
                'code' => 'calls_count',
                'name' => 'Go to voicemail box on calls count'
            ]
        ],

        'announce_frequency' => [0, 30, 60, 90, 120]
    ];

    public function getQueues($perPage = 20)
    {
        return $this
            ->where('id', '<>', 0)
            ->orderBy('id', 'DESC')
            ->paginate($perPage);
    }

    public function addQueue($data)
    {
        return $this->insert($data);
    }

    public function editQueue($id, $data)
    {
        return $this->where('id', $id)->update($data);
//        return $this->where('id', $id)->get();
    }

    public function getQueue($id)
    {
        return $this->find($id);
    }

    public function getStatuses()
    {
        return self::QUEUE_STATUSES;
    }
}
