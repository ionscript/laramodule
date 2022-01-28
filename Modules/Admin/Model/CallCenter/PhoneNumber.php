<?php

declare(strict_types=1);

namespace Modules\Admin\Model\CallCenter;

use Modules\Admin\Model\Eloquent;

class PhoneNumber extends Eloquent
{
    protected $table = 'phone_numbers';

    protected const PHONE_NUMBER_TYPES = [
        1 => [
            'code' => 'voice',
            'name' => 'Voice & SMS'
        ],

        2 => [
            'code' => 'fax',
            'name' => 'Fax'
        ]
    ];

    public function getPhoneNumbers($callCenterId, $perPage = 20)
    {
        return $this
            ->where('call_center_id', $callCenterId)
            ->orderBy('id', 'DESC')
            ->paginate($perPage);
    }

    public function addPhoneNumber($data)
    {
        return $this->insert($data);
    }

    public function deletePhoneNumber($id)
    {

    }

    public function getTypes()
    {
        return self::PHONE_NUMBER_TYPES;
    }
}
