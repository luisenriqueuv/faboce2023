<?php
namespace Modules\RecursosHumanos\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Modules\RecursosHumanos\Services\ReemplazoService;

class ReemplazoRequest extends FormRequest
{
    protected $reemplazoService;

    public function __construct(ReemplazoService $reemplazoService)
    {
        $this->reemplazoService = $reemplazoService;
    }
    public function rules()
    {
        $input = $this->all();
        //DEBEMOS OBTENER EL ID DEL REGISTRO
        //TABLAS rrhh_documento rrhh_tiporegistro
        //A0    INITIAL DE DOCUMENTO
        //01    ID TIPO REGISTRO 
        //2022  AÑO
        //11    DIA
        //001   CORRELATIVO DEL ULTIMO DOCUMENTO REGISTRADO
        //DEBEMOS LLAMAR A LA FUNCION DEL CONTROLADOR
        //SI NO ES UNA ACTUALIZACION GENERARA EL ID PARA REGISTRARLO
        if(!isset($input['UPDATE'])){
            $ID = $this->validarDocumento(trim($input['FECHA_SOLICITUD']));
            $input['ID']                        = trim($ID);
        }
        //SEPARAMOS EL NOMBRE DEL CI Y LO GUARDAMOS EN LA TABLA
        $datos                           = explode('|',trim($input['NOMBRE_COMPLETO']));
        //OBTENEMOS EL CI DE LA PERSONA SELECCIONADA
        $input['CARNET']                 = trim($datos[1]);
        //OBTENEMOS EL NOMBRE DE LA PERSONA SELECCIONADA
        $input['NOMBRE_COMPLETO']        = trim($datos[0]);
        $input['FECHA_SOLICITUD']        = trim($input['FECHA_SOLICITUD']);
        $input['SECCION']                = trim($input['SECCION']);
        $input['FECHA_INICIO_SOLICITUD'] = trim($input['FECHA_INICIO_SOLICITUD']);
        $input['HORA_INICIO_SOLICITUD']  = trim($input['HORA_INICIO_SOLICITUD']);
        $input['FECHA_FIN_SOLICITUD']    = trim($input['FECHA_FIN_SOLICITUD']);
        $input['HORA_FIN_SOLICITUD']     = trim($input['HORA_FIN_SOLICITUD']);
        $input['TOTAL_DIAS']             = trim($input['TOTAL_DIAS']);
        $input['TOTAL_HORAS']            = trim($input['TOTAL_HORAS']);
        $input['OBSERVACION']            = trim($input['OBSERVACION']);
        $this->replace($input);
        return [
                'ID'                    => 'max:15',
                'CARNET'                => 'required|max:20',
                'NOMBRE_COMPLETO'       => 'required|max:255',
                'FECHA_SOLICITUD'       => 'required|max:10',
                'SECCION'               => 'required|max:100',
                'FECHA_INICIO_SOLICITUD'=> 'required|max:10',
                'HORA_INICIO_SOLICITUD' => 'required|max:10',
                'FECHA_FIN_SOLICITUD'   => 'required|max:10',
                'HORA_FIN_SOLICITUD'    => 'required|max:10',
                'TOTAL_DIAS'            => 'max:10',
                'TOTAL_HORAS'           => 'max:10',
                'OBSERVACION'           => 'required|max:200'
        ];
    }
    public function authorize()
    {
        return true;
    }
    public function validarDocumento($FechaSolicitud)
    {
        return $this->reemplazoService->crearIdDocumento($FechaSolicitud);
    }
}