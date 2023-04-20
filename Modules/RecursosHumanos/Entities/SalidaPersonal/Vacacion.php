<?php

namespace Modules\RecursosHumanos\Entities\SalidaPersonal;

use Modules\RecursosHumanos\Entities\Agencia;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\RecursosHumanos\Entities\Personal;


class Vacacion extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    const CREATED_AT        = 'CREATED_AT';
    const UPDATED_AT        = 'UPDATED_AT';
    const DELETED_AT        = 'DELETED_AT';

    protected $connection   = 'sisinvconsolidado2023';
    protected $table        = 'rrhh_vacacion';
    protected $primaryKey   = 'ID';
    public $incrementing    = false;
    protected $keyType      = 'string';

    protected $fillable = [
        'ID',
        'IDDOCUMENTO',
        'AGECODIGO',
        'CARNET',
        'FECHA',
        'OBSERVACION',
        'SECCION'
    ];

    public function personal()
    {
        return $this->belongsTo(Personal::class, 'CARNET', 'CARNET');
    }

    public function agencia()
    {
        return $this->belongsTo(Agencia::class, 'AGECODIGO', 'AGECODIGO');
    }

    public function vacacion1()
    {
        return $this->hasMany(Vacacion1::class, 'IDVACACION', 'ID');
    }

    public function kardex()
    {
        return $this->belongsTo(VacacionKardex::class, 'CARNET', 'CARNET');
    }
}