<?php

declare(strict_types=1);

namespace Modules\Account\Model;


class Address extends Eloquent
{
    protected $table = 'address';

    protected $fillable = [
        'office_id',
        'sid',
        'name',
        'address_1',
        'address_2',
        'city',
        'postcode',
        'country_id',
        'state_id',
        'verified',
        'validated'
    ];

    public function getAddress($id)
    {
        return $this->find($id);
    }

    public function addAddress($data)
    {
        $data['call_center_id'] = $this->getCallCenterId();

        return $this->insert($data);
    }

    public function editAddress($id, $data)
    {
        $data['call_center_id'] = $this->getCallCenterId();

        $this->where('id', $id)->update($data);
    }

    public function deleteAddress(array $ids)
    {
        $this->where('id', $ids)->delete();
    }

    public function getAddresses($limit = 20)
    {
        return $this->where('call_center_id', $this->getCallCenterId())->paginate($limit);
    }

    public function setDefault()
    {
        $callcenter = $this->belongsTo()->first();
        $callcenter->address_id = $this->id;
        $callcenter->save();
    }
}
