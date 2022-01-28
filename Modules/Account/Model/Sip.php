<?php

declare(strict_types=1);

namespace Modules\Account\Model;


class Sip extends Eloquent
{
    protected $table = 'sip';

    protected $fillable = [
        'call_center_id',
        'sip_domain_id',
        'sid',
        'name',
        'password',
        'description',
    ];

    public function getSip($id)
    {
        return $this->find($id);
    }

    public function addSip($data)
    {
        $data['call_center_id'] = $this->getCallCenterId();

        return $this->insert($data);
    }

    public function editSip($id, $data)
    {
        $data['call_center_id'] = $this->getCallCenterId();

        $this->where('id', $id)->update($data);
    }

    public function deleteSip(array $ids)
    {
        $this->where('id', $ids)->delete();
    }

    public function getSips($limit = 20)
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
