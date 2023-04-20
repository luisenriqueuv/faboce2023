<?php

namespace App\Traits\Logistica;

use App\Classes\RegistroClass;
use Modules\Logistica\Facades\SisInv\Entrega;
use Modules\Sas\Facades\SasInv\Trasp;
use Modules\Logistica\Facades\SisInv\PendienteEntregaSI;
use Modules\Logistica\Facades\SisInv\Venta;

trait DespachoTrait
{
    public function get_despachos_by_agencia($agencia)
    {
        $registroclass = new RegistroClass();
        $registros = $registroclass->get_despachos_agencia($agencia);
        $data = [];
        foreach ($registros as $registro) {
            if ($registro->deleted_id == 0) {
                foreach ($registro->registro_detalles as $dr) {
                    if ($dr->factura === '0' && is_null($dr->TDOCUM)) {
                        if ($dr->estado == '*') {
                            $first = PendienteEntregaSI::firstByEdocum($dr->nota);
                            array_push($data, [
                                'fecha'      => $registro->fecha,
                                'codigo'     => $registro->id,
                                'factura'    => $dr->nota,
                                'vendedor'   => '',
                                'glosa'      => $first->GLOSA,
                                'origen'     => $first->AGECODIGO . ' ' . $first->AGENOMBRE,
                                'destino'    => $first->AGECODIGODES . ' ' . $first->AGENOMBREDES,
                                'created_at' => $registro->created_at,
                                'usuario'    => $registro->usuario,
                                'grabacion'  => $registro->grabacion,
                                'tipo'       => 'e',
                                'estado'     => '*'
                            ]);
                        } else {
                            $entrega = Entrega::find($dr->nota);
                            if ($entrega) {
                                array_push($data, array(
                                    'fecha'     => $registro->fecha,
                                    'codigo'    => $registro->id,
                                    'factura'   => $dr->nota,
                                    'vendedor'  => '',
                                    'glosa'     => $entrega->EGLOSA,
                                    'origen'    => $entrega->AGECODIGO . ' - ' . $entrega->agencia->AGENOMBRE,
                                    'destino'   => $entrega->AGECODIGODES . ' - ' . $entrega->agenciades->AGENOMBRE,
                                    'created_at' => $registro->created_at,
                                    'usuario'    => $registro->usuario,
                                    'grabacion'  => $registro->grabacion,
                                    'estado'     => '',
                                    'tipo'       => 'e'
                                ));
                            } else {
                                array_push($data, array(
                                    'fecha'     => $registro->fecha,
                                    'codigo'    => $registro->id,
                                    'factura'   => $dr->nota,
                                    'vendedor'  => '',
                                    'glosa'     => '*** NOTA DE ENTREGA MODIFICADA ***',
                                    'origen'    => '*** ***',
                                    'destino'   => '*** ***',
                                    'created_at' => $registro->created_at,
                                    'usuario'    => $registro->usuario,
                                    'grabacion'  => $registro->grabacion,
                                    'estado'     => '',
                                    'tipo'       => 'e'
                                ));
                            }
                        }
                    } elseif ($dr->nota === '0' && is_null($dr->TDOCUM)) {
                        if ($dr->estado == '*') {
                            $first = PendienteEntregaSI::firstByVdocuma($dr->factura);
                            array_push($data, array(
                                'fecha'      => $registro->fecha,
                                'codigo'     => $registro->id,
                                'factura'    => $dr->factura,
                                'vendedor'   => $first->VENNOMBRE,
                                'glosa'      => $first->GLOSA,
                                'origen'     => $first->AGECODIGO . ' ' . $first->AGENOMBRE,
                                'destino'    => $first->CLICODIGO1 . ' ' . $first->RAZONSOCIAL,
                                'created_at' => $registro->created_at,
                                'usuario'    => $registro->usuario,
                                'grabacion'  => $registro->grabacion,
                                'estado'     => '*',
                                'tipo'       => 'f'
                            ));
                        } else {
                            $venta = Venta::find($dr->factura);
                            if ($venta) {
                                array_push($data, array(
                                    'fecha'     => $registro->fecha,
                                    'codigo'    => $registro->id,
                                    'factura'   => $dr->factura,
                                    'vendedor'  => $venta->vendedor ? $venta->vendedor->VENNOMBRE : '',
                                    'glosa'     => $venta->VGLOSA,
                                    'origen'    => $venta->AGECODIGO . ' - ' . $venta->agencia->AGENOMBRE,
                                    'destino'   => $venta->CLICODIGO . ' - ' . $venta->VNOMBRE,
                                    'created_at' => $registro->created_at,
                                    'usuario'    => $registro->usuario,
                                    'grabacion'  => $registro->grabacion,
                                    'estado'     => '',
                                    'tipo'       => 'f'
                                ));
                            } else {
                                array_push($data, array(
                                    'fecha'     => $registro->fecha,
                                    'codigo'    => $registro->id,
                                    'factura'   => $dr->factura,
                                    'vendedor'  => '',
                                    'glosa'     => '*** FACTURA MODIFICADA ***',
                                    'origen'    => '*** ***',
                                    'destino'   => '*** ***',
                                    'created_at' => $registro->created_at,
                                    'usuario'    => $registro->usuario,
                                    'grabacion'  => $registro->grabacion,
                                    'estado'     => '',
                                    'tipo'       => 'f'
                                ));
                            }
                        }
                    } else {
                        if ($dr->estado == '*') {
                            $first = PendienteEntregaSI::firstByTdocum($dr->TDOCUM);
                            array_push($data, array(
                                'fecha'     => $registro->fecha,
                                'codigo'    => $registro->id,
                                'factura'   => $dr->TDOCUM,
                                'vendedor'  => '',
                                'glosa'      => $first->GLOSA,
                                'origen'     => $first->AGECODIGO . ' ' . $first->AGENOMBRE,
                                'destino'    => $first->AGECODIGODES . ' ' . $first->AGENOMBREDES,
                                'created_at' => $registro->created_at,
                                'usuario'    => $registro->usuario,
                                'grabacion'  => $registro->grabacion,
                                'estado'     => '*',
                                'tipo'       => 't'
                            ));
                        } else {
                            $traspaso = Trasp::find($dr->TDOCUM);
                            if ($traspaso) {
                                array_push($data, array(
                                    'fecha'     => $registro->fecha,
                                    'codigo'    => $registro->id,
                                    'factura'   => $dr->TDOCUM,
                                    'vendedor'  => '',
                                    'glosa'     => $traspaso->TGLOSA,
                                    'origen'    => $traspaso->AGECODIGO . ' - ' . $traspaso->agenciaor->AGENOMBRE,
                                    'destino'   => $traspaso->AGECODIGODES . ' - ' . $traspaso->agenciade->AGENOMBRE,
                                    'created_at' => $registro->created_at,
                                    'usuario'    => $registro->usuario,
                                    'grabacion'  => $registro->grabacion,
                                    'estado'     => '',
                                    'tipo'       => 't'
                                ));
                            } else {
                                array_push($data, array(
                                    'fecha'     => $registro->fecha,
                                    'codigo'    => $registro->id,
                                    'factura'   => $dr->TDOCUM,
                                    'vendedor'  => '',
                                    'glosa'     => '*** NOTA DE TRASPASO MODIFICADA ***',
                                    'origen'    => '*** ***',
                                    'destino'   => '*** ***',
                                    'created_at' => $registro->created_at,
                                    'usuario'    => $registro->usuario,
                                    'grabacion'  => $registro->grabacion,
                                    'estado'     => '',
                                    'tipo'       => 't'
                                ));
                            }
                        }
                    }
                    break;
                }
            } else {
                array_push($data, [
                    'fecha'     => $registro->fecha,
                    'codigo'    => $registro->id,
                    'factura'   => '',
                    'vendedor'  => '',
                    'glosa'     => 'ANULADO',
                    'origen'    => '',
                    'destino'   => '',
                    'created_at' => $registro->created_at,
                    'usuario'    => $registro->usuario,
                    'grabacion'  => $registro->grabacion,
                    'estado'    => ''
                ]);
            }
        }
        return $data;
    }
}
