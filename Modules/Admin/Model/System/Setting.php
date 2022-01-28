<?php

declare(strict_types=1);

namespace Modules\Admin\Model\System;

use Modules\Admin\Model\Eloquent;
use Illuminate\Support\Facades\DB;


class Setting extends Eloquent
{
    protected $table = 'setting';

    public function getSetting($code)
    {
        $data = [];

        $rows = $this->where('code', $code)->get();

        foreach ($rows as $row) {
            if (!$row['serialized']) {
                $data[$row['key']] = $row['value'];
            } else {
                $data[$row['key']] = json_decode($row['value'], true);
            }
        }

        return $data;
    }

    public function editSetting($code, $data)
    {
        $this->deleteSetting($code);

        foreach ($data as $key => $value) {
            $this->insert([
                'code' => $code,
                'key' => $key,
                'value' => is_array($value) ? json_encode($value) : $value,
                'serialized' => is_array($value)
            ]);
        }
    }

    public function deleteSetting($code)
    {
        $this->where('code', $code)->delete();
    }

    public function getSettingValue($key)
    {
        return $this->where('key', $key)->value('value');
    }

    public function editSettingValue($code, $key, $value)
    {
        $this
            ->where([
                'code' => $code,
                'key' => $key
            ])
            ->update([
                'value' => is_array($value) ? json_encode($value) : $value,
                'serialized' => is_array($value)
            ]);
    }

    public function getTimezone($global = false)
    {
        return DB::select('SELECT @@' . ($global ? 'GLOBAL' : 'SESSION') . '.time_zone as timezone')[0]->timezone;
    }

    public function setTimezone($timezone, $global = false)
    {
        $type = $global ? 'GLOBAL' : 'SESSION';

        if(!$result = DB::statement("SET $type time_zone=$timezone;")) {
            error_log("Error[mysql]: SET $type time_zone=$timezone;");
        }
    }

    public function getTimezones($name, $limit = 20)
    {
        return DB::select("SELECT `name` FROM mysql.time_zone_name WHERE `name` LIKE '%$name%' ORDER BY `name` LIMIT {$limit}");
    }
}
