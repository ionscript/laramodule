<?php

declare(strict_types=1);

namespace Modules\Account\Model;


class Department extends Eloquent
{
    protected $table = 'department';

    protected $fillable = [
        'call_center_id',
        'office_id',
        'phone_number_id',
        'name',
        'description'
    ];

    public function getDepartment($id)
    {
        return $this->find($id);
    }

    public function addDepartment($data)
    {
        $data['call_center_id'] = $this->getCallCenterId();

        return $this->insert($data);
    }

    public function editDepartment($id, $data)
    {
        $data['call_center_id'] = $this->getCallCenterId();

        $this->where('id', $id)->update($data);
    }

    public function deleteDepartment($id)
    {
        $this->where('id', $id)->delete();
    }

    public function getDepartments($limit = 20)
    {
        return $this->where('call_center_id', $this->getCallCenterId())->paginate($limit);
    }

    public function getDepartmentsByOfficeId($office_id)
    {
        return $this->where('office_id', $office_id)->get();
    }

    public function getDepartmentsLikeName($name, $limit = 5)
    {
        return  $this->where([
            ['call_center_id', '=', $this->getCallCenterId()],
            ['name', 'LIKE', "%$name%"],
        ])->paginate($limit);
    }
}
