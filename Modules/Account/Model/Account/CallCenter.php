<?php

declare(strict_types=1);

namespace Modules\Account\Model\Account;


use Modules\Account\Model\Eloquent;


class CallCenter extends Eloquent
{
    protected $table = 'call_center';

    protected $fillable = [
        'customer_id',
        'office_id',
        'sip_domain_id',
        'sid',
        'name',
        'description',
        'image',
    ];

    public function getCallCenter($id)
    {
        return $this->find($id);
    }

    public function addCallCenter($data)
    {
        $this->insert($data);
    }

    public function editCallCenter($id, $data)
    {
        $this->where('id', $id)->update($data);
    }

    public function deleteCallCenter($id)
    {
        $this->where('id', $id)->delete();
    }
}
