<?php

declare(strict_types=1);

namespace Modules\Account\Model;


class Submenu extends Eloquent
{
    protected $table = 'submenu';

    protected $fillable = [
        'call_center_id',
        'sid',
        'name',
        'description'
    ];

    public function getSubmenu($id)
    {
        return $this->find($id);
    }

    public function addSubmenu($data)
    {
        $data['call_center_id'] = $this->getCallCenterId();

        return $this->insert($data);
    }

    public function editSubmenu($id, $data)
    {
        $data['call_center_id'] = $this->getCallCenterId();

        $this->where('id', $id)->update($data);
    }

    public function deleteSubmenu(array $ids)
    {
        $this->where('id', $ids)->delete();
    }

    public function getSubmenus($limit = 20)
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
