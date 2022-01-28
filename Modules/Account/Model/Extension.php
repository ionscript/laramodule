<?php

declare(strict_types=1);

namespace Modules\Account\Model;


class Extension extends Eloquent
{
    protected $table = 'extension';

    protected $fillable = [
        'call_center_id',
        'extension',
        'type',
        'destination',
        'name',
        'description',
    ];

    public function getExtension($id)
    {
        return $this->find($id);
    }

    public function addExtension($data)
    {
        $data['call_center_id'] = $this->getCallCenterId();

        return $this->insert($data);
    }

    public function editExtension($id, $data)
    {
        $data['call_center_id'] = $this->getCallCenterId();

        $this->where('id', $id)->update($data);
    }

    public function deleteExtension(array $ids)
    {
        $this->where('id', $ids)->delete();
    }

    public function getExtensions($limit = 20)
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
