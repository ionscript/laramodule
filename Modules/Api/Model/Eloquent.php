<?php

declare(strict_types=1);

namespace Modules\Admin\Model;

use Illuminate\Database\Eloquent\Model;

abstract class Eloquent extends Model
{
    public const CREATED_AT = 'created';

    public const UPDATED_AT = 'updated';

    public $timestamps = FALSE;
}
