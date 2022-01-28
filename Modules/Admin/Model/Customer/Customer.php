<?php

declare(strict_types=1);

namespace Modules\Admin\Model\Customer;

use Illuminate\Support\Facades\Hash;
use Modules\Admin\Model\Eloquent;

class Customer  extends Eloquent
{
    protected $table = 'customer';

    protected $fillable = [
        'group_id',
        'uuid',
        'sid',
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

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getCustomer($id)
    {
        return $this->find($id);
    }

    public function getCustomers($limit = 20)
    {
        return $this->paginate($limit);
    }

    public function addCustomer($data)
    {
        $data['password'] = Hash::make($data['password']);

        return $this->insert($data);
    }

    public function editCustomer($id, $data)
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

    public function deleteCustomer($id)
    {
        $this->where('id', $id)->delete();
    }

    public function editPassword($id, $password)
    {
        $this->where('id', $id)->update([
            'password' => Hash::make($password)
        ]);
    }

    public function getCustomerByUsername($username)
    {
        return $this->where('username', $username)->first();
    }

    public function getCustomerByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}
