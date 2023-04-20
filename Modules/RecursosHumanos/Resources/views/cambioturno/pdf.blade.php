<?php

use Modules\RecursosHumanos\Services\PDF\Cambioturno\CambioturnoPDF;

foreach ($cambioturnos as $cambioturno) {
    $datos = array(
    "ID"                     => $cambioturno->ID,
    "CARNET"                 => $cambioturno->CARNET,
    "NOMBRE_COMPLETO"        => $cambioturno->NOMBRE_COMPLETO,
    "FECHA_SOLICITUD"        => $cambioturno->FECHA_SOLICITUD,
    "SECCION"                => $cambioturno->SECCION,
    "FECHA_INICIO_SOLICITUD" => $cambioturno->FECHA_INICIO_SOLICITUD,
    "HORA_INICIO_SOLICITUD"  => $cambioturno->HORA_INICIO_SOLICITUD,
    "FECHA_FIN_SOLICITUD"    => $cambioturno->FECHA_FIN_SOLICITUD,
    "NOMBRE_REEMPLAZO"       => $cambioturno->NOMBRE_REEMPLAZO,
    "TURNO_REEMPLAZO"        => $cambioturno->TURNO_REEMPLAZO,
    "NOMBRE_REEMPLAZADO"     => $cambioturno->NOMBRE_REEMPLAZADO,
    "TURNO_REEMPLAZADO"      => $cambioturno->TURNO_REEMPLAZADO,
    "OBSERVACION"            => $cambioturno->OBSERVACION);
    $idDocumento             = $cambioturno->ID;
}

$data = [
    'SALDO' => '0',
];

$tipoDocumento =    'CAMBIO DE TURNO';

$pdf = new CambioturnoPDF();
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetTitle('Boleta de Cambio de Turno');
$pdf->SetFillColor(230, 230, 230);
$pdf->SetLeftMargin(15);

// ID
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(98, 7, 'Nro.:', 0, 0, 'R');
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(15, 7, utf8_decode($datos['ID']), 0, 0, 'L');
$pdf->Cell(17);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(98, 7, 'Nro.:', 0, 0, 'R');
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(15, 7, utf8_decode($datos['ID']), 0, 0, 'L');
$pdf->Ln();

// ------------- DATOS TRABAJADOR ----------------------
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(120, 6, 'DATOS TRABAJADOR:', 1, 0, 'L', true);
$pdf->Cell(10);
$pdf->Cell(120, 6, 'DATOS TRABAJADOR:', 1, 0, 'L', true);
$pdf->Ln(8);

$pdf->SetFont('Arial', '', 7);
$pdf->Cell(15, 6, 'Nombre:', 0, 0, 'L');
$pdf->Cell(105, 5, utf8_decode($datos['NOMBRE_COMPLETO']), 'B', 0, 'L');
$pdf->Cell(10);
$pdf->Cell(15, 6, 'Nombre:', 0, 0, 'L');
$pdf->Cell(105, 5, utf8_decode($datos['NOMBRE_COMPLETO']), 'B', 0, 'L');
$pdf->Ln(6);

// FECHA
$pdf->ln(2);
$pdf->Cell(15, 6, utf8_decode('Sección:'), 0, 0, 'L');
$pdf->Cell(70, 5, utf8_decode($seccion), 'B', 0, 'L');
$pdf->Cell(15, 6, 'Fecha:', 0, 0, 'R');
$pdf->Cell(20, 5, utf8_decode(date('d/m/Y', strtotime($datos['FECHA_SOLICITUD']))), 'B', 0, 'C');
$pdf->Cell(10);
$pdf->Cell(15, 6, utf8_decode('Sección:'), 0, 0, 'L');
$pdf->Cell(70, 5, utf8_decode($seccion), 'B', 0, 'L');
$pdf->Cell(15, 6, 'Fecha:', 0, 0, 'R');
$pdf->Cell(20, 5, utf8_decode(date('d/m/Y', strtotime($datos['FECHA_SOLICITUD']))), 'B', 0, 'C');
$pdf->Ln(9);

//FECHAS DE SOLICITUD
//DESDE FECHA Y HORAS 
$pdf->Cell(15, 6, utf8_decode('Solicito licencia comenzando :'), 0, 0, 'L');
$pdf->Cell(20);
$pdf->Cell(40, 5, utf8_decode($datos['FECHA_INICIO_SOLICITUD']),'B', 0, 'C');
$pdf->Cell(55);
$pdf->Cell(15, 6, utf8_decode('Solicito licencia comenzando :'), 0, 0, 'L');
$pdf->Cell(20);
$pdf->Cell(40, 5, utf8_decode($datos['FECHA_INICIO_SOLICITUD']),'B', 0, 'C');
$pdf->Ln(9);

//HASTA FECHA Y HORAS 
$pdf->Cell(15, 6, utf8_decode('Terminado :'), 0, 0, 'L');
$pdf->Cell(20);
$pdf->Cell(40, 5, utf8_decode($datos['FECHA_FIN_SOLICITUD']),'B', 0, 'C');
$pdf->Cell(55);
$pdf->Cell(15, 6, utf8_decode('Terminando :'), 0, 0, 'L');
$pdf->Cell(20);
$pdf->Cell(40, 5, utf8_decode($datos['FECHA_FIN_SOLICITUD']),'B', 0, 'C');
$pdf->Ln(9);

//NOMBRES REEMPLAZADOO
$pdf->Cell(15, 6, utf8_decode('REEMPLAZADO :'), 0, 0, 'L');
$pdf->Cell(10);
$pdf->Cell(70, 5, utf8_decode($datos['NOMBRE_REEMPLAZADO']),'B', 0, 'C');
$pdf->Cell(15, 6, 'Turno :', 0, 0, 'R');
$pdf->Cell(10, 5, utf8_decode($datos['TURNO_REEMPLAZADO']), 'B', 0, 'C');
$pdf->Cell(10);
$pdf->Cell(15, 6, utf8_decode('REEMPLAZADO :'), 0, 0, 'L');
$pdf->Cell(10);
$pdf->Cell(70, 5, utf8_decode($datos['NOMBRE_REEMPLAZADO']),'B', 0, 'C');
$pdf->Cell(15, 6, 'Turno :', 0, 0, 'R');
$pdf->Cell(10, 5, utf8_decode($datos['TURNO_REEMPLAZADO']), 'B', 0, 'C');
$pdf->Ln(9);


//NOMBRES REEMPLAZADO
$pdf->Cell(15, 6, utf8_decode('REEMPLAZO :'), 0, 0, 'L');
$pdf->Cell(10);
$pdf->Cell(70, 5, utf8_decode($datos['NOMBRE_REEMPLAZO']),'B', 0, 'C');
$pdf->Cell(15, 6, 'Turno :', 0, 0, 'R');
$pdf->Cell(10, 5, utf8_decode($datos['TURNO_REEMPLAZO']), 'B', 0, 'C');
$pdf->Cell(10);
$pdf->Cell(15, 6, utf8_decode('REEMPLAZO :'), 0, 0, 'L');
$pdf->Cell(10);
$pdf->Cell(70, 5, utf8_decode($datos['NOMBRE_REEMPLAZO']),'B', 0, 'C');
$pdf->Cell(15, 6, 'Turno :', 0, 0, 'R');
$pdf->Cell(10, 5, utf8_decode($datos['TURNO_REEMPLAZO']), 'B', 0, 'C');
$pdf->Ln(9);


/*
// ------------- OBSERVACION -----------------------
$x1 = $pdf->GetX();
$y1 = $pdf->GetY();

$x = $pdf->GetX();
$y = $pdf->GetY();
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(40, 6, 'OBSERVACIONES:', '', 1, 'L', false);
$pdf->Ln(0);
$pdf->SetFont('Arial', '', 7);
$pdf->MultiCell(120, 10, utf8_decode($datos['OBSERVACION']), 0, 'J', 0);
$pdf->SetXY($x + 130, $y);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(40, 6, 'OBSERVACIONES:', '', 1, 'L', false);
$pdf->SetXY($x + 130, $y+6);
$pdf->SetFont('Arial', '', 7);
$pdf->MultiCell(120, 10, utf8_decode($datos['OBSERVACION']), 0, 'J', 0);

$pdf->Ln(60);
$pdf->Cell(0);
$pdf->SetXY($x1,$y1+40);
*/
$pdf->Ln(10);
// ------------- RAZÓN DE SOLICITANTE -----------------------
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(40, 6, 'MOTIVO DE BOLETA:', 'TBL', 0, 'L', true);
$pdf->SetFont('Arial', 'IB', 8);
$pdf->Cell(80, 6, utf8_decode($tipoDocumento), 'TBR', 0, 'L', true);
$pdf->Cell(10);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(40, 6, 'MOTIVO DE BOLETA:', 'TBL', 0, 'L', true);
$pdf->SetFont('Arial', 'IB', 8);
$pdf->Cell(80, 6, utf8_decode($tipoDocumento), 'TBR', 0, 'L', true);
$pdf->Ln(9);

//--------- ASINGAMOS EL NOMBRE AL ARCHIVO Y METEMOS LA FECHA DEL SERVER
$fechaNombre = Date('Ymd');
$horaNombre  = Date('Hm');
$modo        = "I";

$nombre_archivo= $idDocumento.'_'.$tipoDocumento."_".$fechaNombre."_".$horaNombre.'_'.trim($idusuario).".pdf";
$pdf->Output($nombre_archivo,$modo); 
exit();