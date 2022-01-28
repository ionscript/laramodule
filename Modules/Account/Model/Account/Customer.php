<?php

declare(strict_types=1);

namespace Modules\Account\Model\Account;

use Illuminate\Support\Facades\Hash;
use Modules\Account\Model\AuthenticatableModel;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Customer extends AuthenticatableModel implements MustVerifyEmail
{
    use Notifiable;

    protected $table = 'customer';

    protected $fillable = [
        'group_id',
        'call_center_id',
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

    public function getCustomer(int $id)
    {
        return $this->find($id);
    }

    public function editCustomer(array $data, int $id = null)
    {
        $password = $data['password'];

        unset($data['password']);

        if($id) {
            $this->where('id', $id)->update($data);
        } else {
            $this->update($data);
        }

        if ($password) {
            $this->where('id', $id)->update([
                'password' => Hash::make($password)
            ]);
        }
    }

    public function editPassword($id, $password)
    {
        $this->where('id', $id)->update([
            'password' => Hash::make($password)
        ]);
    }

    public function callcenter()
    {
        return $this->hasOne(CallCenter::class)->first();
    }
}
