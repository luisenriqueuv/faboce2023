<?php

if (!function_exists('fechaCastellano')) {
    function fechaCastellano($fecha)
    {
        $fecha = substr($fecha, 0, 10);
        $dia = date('d', strtotime($fecha));
        $mes = date('F', strtotime($fecha));
        $anio = date('Y', strtotime($fecha));
        $meses_ES = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        $meses_EN = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
        return $dia . ' de ' . $nombreMes . ' de ' . $anio;
    }
}
