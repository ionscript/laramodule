<?php

declare(strict_types=1);

namespace Modules\Admin\Model\User;

use Modules\Admin\Model\Eloquent;
use Illuminate\Support\Facades\Hash;


class User extends Eloquent
{
    protected $table = 'user';

    protected $fillable = [
        'group_id',
        'username',
        'password',
        'remember_token',
        'firstname',
        'lastname',
        'email',
        'image',
        'ip',
        'status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getUser($id)
    {
        return $this->find($id);
    }

    public function getUsers($limit = 20)
    {
        return $this->paginate($limit);
    }

    public function addUser($data)
    {
        $data['password'] = Hash::make($data['password']);

        return $this->insert($data);
    }

    public function editUser($id, $data)
    {
        $password = $data['password'];

        unset($data['password']);

        $this->where('id', $id)->update($data);

        if ($password) {
            $this->where('id', $id)->update([
                'password' => Hash::make($password)
            ]);
        }
    }

    public function deleteUser($id)
    {
        $this->where('id', $id)->delete();
    }

    public function editPassword($id, $password)
    {
        $this->where('id', $id)->update([
            'password' => Hash::make($password)
        ]);
    }

    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}
