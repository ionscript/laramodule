<?php

declare(strict_types=1);

namespace Modules\Admin\Model\CallCenter;

use Modules\Admin\Model\Eloquent;

class Agent extends Eloquent
{
    protected $table = 'agents';

    public function getAgents($callCenterId, $perPage = 20)
    {
        return $this
            ->where('call_center_id', $callCenterId)
            ->orderBy('id', 'DESC')
            ->paginate($perPage);
    }

    public function addAgent($data)
    {
        return $this->insert($data);
    }
}
