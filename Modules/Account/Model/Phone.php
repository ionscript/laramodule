<?php

declare(strict_types=1);

namespace Modules\Account\Model;


class Phone extends Eloquent
{
    protected $table = 'phone';

    protected $fillable = [
        'sid',
        'call_center_id',
        'department_id',
        'number',
        'name',
        'description',
        'mode',
        'type',
        'origin',
        'capabilities',
        'emergency_status'
    ];

    public function getPhone($id)
    {
        $data['call_center_id'] = $this->getCallCenterId();

        return $this->find($id);
    }

    public function addPhone($data)
    {
        $data['call_center_id'] = $this->getCallCenterId();

        return $this->insert($data);
    }

    public function editPhone($id, $data)
    {
        $this->where('id', $id)->update($data);
    }

    public function deletePhone(array $ids)
    {
        $this->where('id', $ids)->delete();
    }

    public function getPhones($limit = 20)
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
