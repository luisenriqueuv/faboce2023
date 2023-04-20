<?php
// ----------------------------------------------
//              REQUEST (FORMULARIO)
// ----------------------------------------------
namespace Modules\RecursosHumanos\Http\Requests;

use Modules\Sas\Facades\SasInv\Conexion;
use Illuminate\Foundation\Http\FormRequest;

class FormularioRequest extends FormRequest
{
    public function rules()
    {
        // LIMPIAR ESPACIOS
        $input = $this->all();
        $input['codigo'] = trim($input['codigo']);
        $input['nombre'] = trim($input['nombre']);
        $input['descripcion'] = trim($input['descripcion']);
        $this->replace($input);        

        // CONEXION DB
        $db = Conexion::getConnectionByType('SISFAB');
        // CAMPO PRIMARY KEY
        $r = $this->route('id') ? ',' .  $this->route('id') . ',id' : '';

        // CAMPO UNICO
        return [
            'codigo' => 'required|max:10|min:1|unique:' . $db . '.rrhh_formulario,codigo' . $r,
            'nombre' => 'required|max:50',
            'descripcion' => 'max:100'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
