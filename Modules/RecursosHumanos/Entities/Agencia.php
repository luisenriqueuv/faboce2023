<?php

namespace Modules\RecursosHumanos\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agencia extends Model
{
    use SoftDeletes;

    protected $table = 'agencias';
    protected $primaryKey = 'AGECODIGO';
}
