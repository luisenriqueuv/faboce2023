<?php

namespace Modules\RecursosHumanos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PruebaRequest extends FormRequest
{
    public function rules()
    {
        $input = $this->all();
        $input['DETALLE'] = trim($input['DETALLE']);
        $input['DETALLE_1'] = trim($input['DETALLE_1']);
        $this->replace($input);

        return [
            'DETALLE' => 'required|max:20',
            'DETALLE_1' => 'required|max:20'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
