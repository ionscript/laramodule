<?php

declare(strict_types=1);

namespace Modules\Account\Model;


class Office extends Eloquent
{
    protected $table = 'office';

    protected $fillable = [
        'call_center_id',
        'address_id',
        'department_id',
        'name',
        'description'
    ];

    public function getOffice($id)
    {
        return $this->find($id);
    }

    public function addOffice($data)
    {
        $data['office']['call_center_id'] = $this->getCallCenterId();

        $id = $this->insertGetId($data['office']);

        if ($data['department']) {
            $departments = [];

            foreach ($data['department'] as $department_id) {
                $departments += [
                    'id' => $department_id
                ];
            }

            $this->getConnection()->table('department')->where($departments)->update(['office_id'=>$id]);
        }

        return true;
    }

    public function editOffice($id, $data)
    {
        $data['office']['call_center_id'] = $this->getCallCenterId();

        $this->where('id', $id)->update($data['office']);

        if ($data['department']) {
            $departments = [];

            foreach ($data['department'] as $department_id) {
                $departments += [
                    'id' => $department_id
                ];
            }

            $this->getConnection()->table('department')->where('office_id', $id)->update(['office_id'=>0]);
            $this->getConnection()->table('department')->where($departments)->update(['office_id'=>$id]);
        }

        return true;
    }

    public function deleteOffice($id)
    {
        $this->where('id', $id)->delete();
    }

    public function getOffices($limit = 20)
    {
        return $this->where('call_center_id', $this->getCallCenterId())->paginate($limit);
    }

    public function getOfficeDepartments($limit = 20)
    {
        return $this->where('call_center_id', $this->getCallCenterId())->paginate($limit);
    }
}
