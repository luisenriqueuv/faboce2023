<?php
namespace Modules\RecursosHumanos\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Modules\RecursosHumanos\Facades\Documento;
use Modules\RecursosHumanos\Facades\Tiporegistro;
use Modules\RecursosHumanos\Services\CompensacionService;
use PhpParser\Node\Stmt\Else_;

class CompensacionRequest extends FormRequest
{
    protected $compensacionService;

    public function __construct(CompensacionService $compensacionService)
    {
        $this->compensacionService = $compensacionService;
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
        $datos                              = explode('|',trim($input['NOMBRE_COMPLETO']));
        //OBTENEMOS EL CI DE LA PERSONA SELECCIONADA
        $input['CARNET']                    = trim($datos[1]);
        //OBTENEMOS EL NOMBRE DE LA PERSONA SELECCIONADA
        $input['NOMBRE_COMPLETO']           = trim($datos[0]);
        $input['FECHA_SOLICITUD']           = trim($input['FECHA_SOLICITUD']);
        $input['SECCION']                   = trim($input['SECCION']);
        $input['FECHA_INICIO_SOLICITUD']    = trim($input['FECHA_INICIO_SOLICITUD']);
        $input['HORA_INICIO_SOLICITUD']     = trim($input['HORA_INICIO_SOLICITUD']);
        $input['FECHA_FIN_SOLICITUD']       = trim($input['FECHA_FIN_SOLICITUD']);
        $input['HORA_FIN_SOLICITUD']        = trim($input['HORA_FIN_SOLICITUD']);
        $input['TOTAL_DIAS']                = trim($input['TOTAL_DIAS']);
        $input['TOTAL_HORAS']               = trim($input['TOTAL_HORAS']);
        $input['OBSERVACION']               = trim($input['OBSERVACION']);
        //METEMOS EL IDDOCUMENTO
        $input['IDDOCUMENTO']               = $this->devolverIdDocumento();
        $this->replace($input);
        return [
                'ID'                    => 'max:15',
                'CARNET'                => 'required|string|max:20',
                'NOMBRE_COMPLETO'       => 'required|max:100',
                'FECHA_SOLICITUD'       => 'max:12',
                'SECCION'               => 'max:100',
                'FECHA_INICIO_SOLICITUD'=> 'required|max:10',
                'HORA_INICIO_SOLICITUD' => 'max:8',
                'FECHA_FIN_SOLICITUD'   => 'required|max:10',
                'HORA_FIN_SOLICITUD'    => 'max:8',
                'TOTAL_DIAS'            => 'max:3',
                'TOTAL_HORAS'           => 'max:8',
                'OBSERVACION'           => 'required|max:200',
                'DELETED_ID'            => '',
                'IDDOCUMENTO'           => ''
        ];
    }
    public function authorize()
    {
        return true;
    }
    public function validarDocumento($FechaSolicitud)
    {
        return $this->compensacionService->crearIdDocumento($FechaSolicitud);
    }
    public function devolverIdDocumento(){
        $tiposregistros  = Tiporegistro::find(4); //DEVOLVERA 4 | COMPENSACION
        $idTregistro     = $tiposregistros->ID;
        $idTipoDocumento = Documento::typeDocumentoByIdTipoRegistro($idTregistro);
        $zonas           = $idTipoDocumento->pluck('INITIAL')->unique();
        $initialDocumento = $zonas[0];
        return $initialDocumento;
    }
    public function devolverAgenciaDocumento(){
        $tiposregistros  = Tiporegistro::find(4); //DEVOLVERA 4 | COMPENSACION
        $idTregistro     = $tiposregistros->ID;
        $idTipoDocumento = Documento::ageCodigoByIdTipoRegistro($idTregistro);
        $zonas           = $idTipoDocumento->pluck('AGECODIGO')->unique();
        $ageCodigo       = $zonas[0];
        return $ageCodigo;
    }
}