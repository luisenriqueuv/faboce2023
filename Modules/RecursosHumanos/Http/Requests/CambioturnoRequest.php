<?php
namespace Modules\RecursosHumanos\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Modules\RecursosHumanos\Services\CambioturnoService;

class CambioturnoRequest extends FormRequest
{
    protected $cambioturnoService;

    public function __construct(CambioturnoService $cambioturnoService)
    {
        $this->cambioturnoService = $cambioturnoService;
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
        $input['NOMBRE_COMPLETO']        = trim($datos[0]);
        $input['FECHA_SOLICITUD']        = trim($input['FECHA_SOLICITUD']);
        $input['SECCION']                = trim($input['SECCION']);
        $input['FECHA_INICIO_SOLICITUD'] = trim($input['FECHA_INICIO_SOLICITUD']);
        $input['FECHA_FIN_SOLICITUD']    = trim($input['FECHA_FIN_SOLICITUD']);
//        $input['NOMBRE_REEMPLAZO']       = trim($input['NOMBRE_REEMPLAZO']);
        $datosReemplazo                  = explode('|',trim($input['NOMBRE_REEMPLAZO']));
        $input['NOMBRE_REEMPLAZO']       = trim($datosReemplazo[0]);
        $input['TURNO_REEMPLAZO']        = trim($input['TURNO_REEMPLAZO']);
//        $input['NOMBRE_REEMPLAZADO']     = trim($input['NOMBRE_REEMPLAZADO']);
        $datosReemplazado                  = explode('|',trim($input['NOMBRE_REEMPLAZADO']));
        $input['NOMBRE_REEMPLAZADO']     = trim($datosReemplazado[0]);
        $input['TURNO_REEMPLAZADO']      = trim($input['TURNO_REEMPLAZADO']);
        $this->replace($input);
        return ['ID'                     => 'max:20',
                'CARNET'                 => 'required|max:20',
                'NOMBRE_COMPLETO'        => 'required|max:255',
                'FECHA_SOLICITUD'        => 'required|max:10',
                'SECCION'                => 'required|max:100',
                'FECHA_INICIO_SOLICITUD' => 'required|max:10',
                'FECHA_FIN_SOLICITUD'    => 'required|max:10',
                'NOMBRE_REEMPLAZO'       => 'required|max:100',
                'TURNO_REEMPLAZO'        => 'required|max:20',
                'NOMBRE_REEMPLAZADO'     => 'required|max:100',
                'TURNO_REEMPLAZADO'      => 'required|max:20',
                'DELETED_AT'             => '',
                'DELETED_ID'             => '',
        ];
    }

    public function authorize()
    {
        return true;
    }
    public function validarDocumento($FechaSolicitud)
    {
        return $this->cambioturnoService->crearIdDocumento($FechaSolicitud);
    }
}