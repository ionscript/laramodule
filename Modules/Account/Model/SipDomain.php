<?php

declare(strict_types=1);

namespace Modules\Account\Model;


class SipDomain extends Eloquent
{
    protected $table = 'sip_domain';

    protected $fillable = [
        'call_center_id',
        'sid',
        'domain',
        'name',
        'description'
    ];

    public function getSipDomain($id)
    {
        return $this->find($id);
    }

    public function addSipDomain($data)
    {
        $data['call_center_id'] = $this->getCallCenterId();

        return $this->insert($data);
    }

    public function editSipDomain($id, $data)
    {
        $data['call_center_id'] = $this->getCallCenterId();

        $this->where('id', $id)->update($data);
    }

    public function deleteSipDomain(array $ids)
    {
        $this->where('id', $ids)->delete();
    }

    public function getSipDomains($limit = 20)
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
