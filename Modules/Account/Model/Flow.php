<?php

declare(strict_types=1);

namespace Modules\Account\Model;


class Flow extends Eloquent
{
    protected $table = 'flow';

    protected $fillable = [
        'call_center_id',
        'name',
        'description'
    ];

    public function getFlow($id)
    {
        return $this->find($id);
    }

    public function addFlow($data)
    {
        $data['call_center_id'] = $this->getCallCenterId();

        return $this->insert($data);
    }

    public function editFlow($id, $data)
    {
        $data['call_center_id'] = $this->getCallCenterId();

        $this->where('id', $id)->update($data);
    }

    public function deleteFlow(array $ids)
    {
        $this->where('id', $ids)->delete();
    }

    public function getFlows($limit = 20)
    {
        return $this->where('call_center_id', $this->getCallCenterId())->paginate($limit);
    }

//    public function setDefault()
//    {
//        $callcenter = $this->belongsTo(Office::class)->first();
//        $callcenter->address_id = $this->id;
//        $callcenter->save();
//    }
}
