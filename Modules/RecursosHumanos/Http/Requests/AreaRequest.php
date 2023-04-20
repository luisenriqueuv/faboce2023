<?php

namespace Modules\RecursosHumanos\Http\Requests;

use Modules\Sas\Facades\SasInv\Conexion;
use Illuminate\Foundation\Http\FormRequest;

class AreaRequest extends FormRequest
{
    public function rules()
    {
        $input = $this->all();
        $input['codigo'] = trim($input['codigo']);
        $input['descripcion'] = trim($input['descripcion']);
        $this->replace($input);

        $db = Conexion::getConnectionByType('SISFAB');
        $r = $this->route('area') ? ',' . $input['codigo'] . ',codigo' : '';

        return [
            'codigo' => 'required|max:5|unique:' . $db . '.rrhh_area,codigo' . $r,
            'descripcion' => 'required|max:200'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
