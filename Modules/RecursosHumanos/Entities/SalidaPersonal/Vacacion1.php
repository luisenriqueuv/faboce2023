<?php

namespace Modules\RecursosHumanos\Entities\SalidaPersonal;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Vacacion1 extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'UPDATED_AT';

    protected $table = 'rrhh_vacacion1';
    protected $primaryKey = 'ID';
    protected $connection = 'sisinvconsolidado';

    protected $fillable = [
                            'IDVACACION',
                            'AGECODIGO',
                            'CARNET',
                            'FECHA',
                            'FECHAI',
                            'FECHAF',
                            'FECHARETORNO',
                            'HORAI1',
                            'HORAI2',
                            'HORAF1',
                            'HORAF2',
                            'DIAS',
                            'MEDIODIAI',
                            'MEDIODIAF',
                            'OBSERVACION'
    ];
}
