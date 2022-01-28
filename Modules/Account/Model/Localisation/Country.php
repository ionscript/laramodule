<?php

declare(strict_types=1);

namespace Modules\Account\Model\Localisation;

use Modules\Account\Model\Eloquent;

class Country extends Eloquent
{
    protected $table = 'country';

    protected $fillable = [
        'name',
        'iso_code_1',
        'iso_code_2',
        'address_format',
        'status'
    ];

    public function getCountry($id)
    {
        return $this->find($id);
    }

    public function getCountryByCode($code)
    {
        return $this->where('iso_code_' . count($code), $code)->first();
    }

    public function getCountries($limit = 20)
    {
        return $this->paginate($limit);
    }

    public function getAllCountries()
    {
        return $this->where('id', '<>', 0)->get();
    }
}
