<?php

declare(strict_types=1);

namespace Modules\Application\Model;

use Modules\Admin\Model\Eloquent;


class Page extends Eloquent
{
    protected $table = 'page';

    protected $fillable = [
        'title',
        'description',
        'keyword',
        'top',
        'bottom',
        'status',
        'sort_order',
        'column_order',
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

    public function getTopPages()
    {
        return $this->where('top', 1)->get()->all();
    }

    public function getBottomPages()
    {
        return $this->where('bottom', 1)->get()->all();
    }
}
