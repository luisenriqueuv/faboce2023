<?php

namespace Modules\RecursosHumanos\Entities;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documento extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $table = 'rrhh_documento';
    protected $primaryKey = 'ID';

    protected $fillable = [
                            'ID',
                            'IDTIPOREGISTRO',
                            'TITLE',
                            'AGECODIGO',
                            'INITIAL'
    ];

    public function __construct()
    {
        $this->setConnection(config("app.consolidado"));
    }
}
