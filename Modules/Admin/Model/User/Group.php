<?php

declare(strict_types=1);

namespace Modules\Admin\Model\User;

use Modules\Admin\Model\Eloquent;


class Group extends Eloquent
{
    protected $table = 'user_group';

    protected $fillable = [
        'name',
        'permission'
    ];

    public function getGroup($id)
    {
        $data = $this->find($id);
        $data['permission'] = json_decode($data['permission'], true);

        return $data;
    }

    public function getGroups($limit = 20)
    {
        return $this->paginate($limit);
    }

    public function getAllGroups()
    {
        return $this->all();
    }

    public function addGroup($data)
    {
        $data['permission'] = json_encode($data['permission']);

        return $this->insert($data);
    }

    public function editGroup($id, $data)
    {
        $data['permission'] = json_encode($data['permission']);

        $this->where('id', $id)->update($data);
    }

    public function deleteGroup($id)
    {
        $this->where('id', $id)->delete();
    }

}
