<?php

declare(strict_types=1);

namespace Modules\Admin\Model\System;

use Modules\Admin\Model\Eloquent;


class Page extends Eloquent
{
    protected $table = 'page';

    protected $fillable = [
        'title',
        'description',
        'slug',
        'top',
        'bottom',
        'status',
        'viewed'
    ];

    public function getPage($id)
    {
        return $this->find($id);
    }

    public function getPages($perPage = 20)
    {
        return $this->paginate($perPage);
    }

    public function addPage($data)
    {
        return $this->insert($data);
    }

    public function editPage($id, $data)
    {
        $this->where('id', $id)->update($data);
    }

    public function deletePage($id)
    {
        $this->where('id', $id)->delete();
    }

}
