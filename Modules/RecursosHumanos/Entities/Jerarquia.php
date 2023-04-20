<?php

namespace Modules\RecursosHumanos\Entities;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jerarquia extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $table = 'rrhh_jerarquia';

    protected $fillable = [
        'descripcion'
    ];

    public function setDescripcionAttribute($value)
    {
        $this->attributes['descripcion'] = strtoupper($value);
    }

    public function getDescripcionAttribute($value)
    {
        return strtoupper($value);
    }
}
