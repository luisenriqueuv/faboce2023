<?php

// ----------------------------------------------
//              REQUEST (FORMULARIO 1) 
// ----------------------------------------------

namespace Modules\RecursosHumanos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Formulario1Request extends FormRequest
{
    public function rules()
    {
        $input = $this->all();        
        $input['nombre'] = trim($input['nombre']);                
        $this->replace($input);

        return [            
            'nombre' => 'required|max:500',
            'id_formulario'=>'required'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
