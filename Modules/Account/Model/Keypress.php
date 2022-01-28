<?php

declare(strict_types=1);

namespace Modules\Account\Model;

class Keypress extends Eloquent
{
    protected $table = 'keypress';

    protected $fillable = [
        'call_center_id',
        'submenu_id',
        'target_id',
        'number',
        'code'
    ];

    public function getKeypress($id)
    {
        return $this->find($id);
    }

    public function addKeypress($data)
    {
        $data['call_center_id'] = $this->getCallCenterId();

        return $this->insert($data);
    }

    public function editKeypress($id, $data)
    {
        $data['call_center_id'] = $this->getCallCenterId();

        $this->where('id', $id)->update($data);
    }

    public function deleteKeypress(array $ids)
    {
        $this->where('id', $ids)->delete();
    }

    public function getKeypresses($limit = 20)
    {
        return $this->where('call_center_id', $this->getCallCenterId())->paginate($limit);
    }
}
