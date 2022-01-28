<?php

declare(strict_types=1);

namespace Modules\Account\Model\Localisation;

use Modules\Account\Model\Eloquent;

class State extends Eloquent
{
    protected $table = 'state';

    protected $fillable = [
        'country_id',
        'name',
        'code',
        'status'
    ];

    public function getState($id)
    {
        return $this->find($id);
    }

    public function getStates($limit = 20)
    {
        return $this->paginate($limit);
    }

    public function addAddress($data)
    {
        return $this->insert($data);
    }

    public function getStatesByCountryId($country_id)
    {
        return $this->where('country_id', $country_id)->get();
    }
}
