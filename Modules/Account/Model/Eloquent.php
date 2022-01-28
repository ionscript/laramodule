<?php

declare(strict_types=1);

namespace Modules\Account\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Database\Eloquent\SoftDeletes;

abstract class Eloquent extends Model
{
//    use SoftDeletes;

    public const CREATED_AT = 'created';

    public const UPDATED_AT = 'updated';

    protected static $callCenterId;

    public function getCallCenterId()
    {
        if(!static::$callCenterId) {
            static::$callCenterId = Auth::user()->callcenter()->id;
        }

        return static::$callCenterId;
    }

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = FALSE;

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
//    protected $attributes = [
//        'delayed' => false,
//    ];

    /**
     * The connection name for the model.
     *
     * @var string
     */
//    protected $connection = 'connection-name';

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
//    protected $dateFormat = 'U';

    /**
     * The table associated with the model.
     *
     * @var string
     */
//    protected $table = '';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
//    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
//    public $incrementing = false;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
//    protected $keyType = 'string';




}
