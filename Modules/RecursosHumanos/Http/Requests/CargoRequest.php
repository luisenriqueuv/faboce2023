<?php

namespace Modules\RecursosHumanos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CargoRequest extends FormRequest
{
    public function rules()
    {
        $input = $this->all();
        $input['descripcion'] = trim($input['descripcion']);
        $this->replace($input);

        return [
            'descripcion' => 'required|max:200'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
