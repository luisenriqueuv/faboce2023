<?php
namespace Modules\RecursosHumanos\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Modules\RecursosHumanos\Services\DescansoService;

class DescansoRequest extends FormRequest
{
    protected $descansoService;

    public function __construct(DescansoService $descansoService)
    {
        $this->descansoService = $descansoService;
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
        $input['FECHA_RETORNO']          = trim($input['FECHA_RETORNO']);
        $input['DIAS_VACACION']          = trim($input['TOTAL_DIAS']);
        $input['HORAS_VACACION']         = trim($input['TOTAL_HORAS']);
        $this->replace($input);
        return ['ID'                    => 'max:20',
                'CARNET'                => 'required|max:20',
                'NOMBRE_COMPLETO'       => 'required|max:255',
                'FECHA_SOLICITUD'       => 'required|max:10',
                'SECCION'               => 'required|max:10',
                'FECHA_INICIO_SOLICITUD'=> 'required|max:10',
                'HORA_INICIO_SOLICITUD' => 'required|max:8',
                'FECHA_FIN_SOLICITUD'   => 'required|max:10',
                'HORA_FIN_SOLICITUD'    => 'required|max:8',
                'OBSERVACION'           => 'required|max:250',
                'FECHA_RETORNO'         => 'required|max:10',
                'TOTAL_DIAS'            => 'max:10',
                'TOTAL_HORAS'           => 'max:8',
                'DIAS_VACACION'         => 'max:10',
                'HORAS_VACACION'        => 'max:8',
                'SALDO_FAVOR_VACACION'  => 'max:100',
                'DELETED_AT'            => 'max:2',
                'DELETED_ID'            => 'max:2',
        ];
    }

    public function authorize()
    {
        return true;
    }
    public function validarDocumento($FechaSolicitud)
    {
        return $this->descansoService->crearIdDocumento($FechaSolicitud);
    }
}