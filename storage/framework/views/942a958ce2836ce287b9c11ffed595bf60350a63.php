<?php

use Modules\RecursosHumanos\Services\PDF\Reemplazo\ReemplazoPDF;

foreach ($reemplazos as $reemplazo) {
    $datos = array(
    "ID"                     => $reemplazo->ID,
    "CARNET"                 => $reemplazo->CARNET,
    "NOMBRE_COMPLETO"        => $reemplazo->NOMBRE_COMPLETO,
    "FECHA_SOLICITUD"        => $reemplazo->FECHA_SOLICITUD,
    "SECCION"                => $reemplazo->SECCION,
    "FECHA_INICIO_SOLICITUD" => $reemplazo->FECHA_INICIO_SOLICITUD,
    "HORA_INICIO_SOLICITUD"  => $reemplazo->HORA_INICIO_SOLICITUD,
    "FECHA_FIN_SOLICITUD"    => $reemplazo->FECHA_FIN_SOLICITUD,
    "HORA_FIN_SOLICITUD"     => $reemplazo->HORA_FIN_SOLICITUD,
    "TOTAL_DIAS"             => $reemplazo->TOTAL_DIAS,
    "TOTAL_HORAS"            => $reemplazo->TOTAL_HORAS,
    "OBSERVACION"            => $reemplazo->OBSERVACION);
    $idDocumento             = $reemplazo->ID;
}

$data = [
    'SALDO' => '0',
];

$tipoDocumento =    'REEMPLAZO';

$pdf = new ReemplazoPDF();
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetTitle('Boleta de Reemplazo');
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
$pdf->Cell(15, 6, 'De Horas:', 0, 0, 'R');
$pdf->Cell(30, 5, utf8_decode($datos['HORA_INICIO_SOLICITUD']), 'B', 0, 'C');
$pdf->Cell(10);
$pdf->Cell(15, 6, utf8_decode('Solicito licencia comenzando :'), 0, 0, 'L');
$pdf->Cell(20);
$pdf->Cell(40, 5, utf8_decode($datos['FECHA_INICIO_SOLICITUD']),'B', 0, 'C');
$pdf->Cell(15, 6, 'De Horas:', 0, 0, 'R');
$pdf->Cell(30, 5, utf8_decode($datos['HORA_INICIO_SOLICITUD']), 'B', 0, 'C');
$pdf->Ln(9);

//HASTA FECHA Y HORAS 
$pdf->Cell(15, 6, utf8_decode('Terminado :'), 0, 0, 'L');
$pdf->Cell(20);
$pdf->Cell(40, 5, utf8_decode($datos['FECHA_FIN_SOLICITUD']),'B', 0, 'C');
$pdf->Cell(15, 6, 'A Horas:', 0, 0, 'R');
$pdf->Cell(30, 5, utf8_decode($datos['HORA_FIN_SOLICITUD']), 'B', 0, 'C');
$pdf->Cell(10);
$pdf->Cell(15, 6, utf8_decode('Terminando :'), 0, 0, 'L');
$pdf->Cell(20);
$pdf->Cell(40, 5, utf8_decode($datos['FECHA_FIN_SOLICITUD']),'B', 0, 'C');
$pdf->Cell(15, 6, 'A Horas:', 0, 0, 'R');
$pdf->Cell(30, 5, utf8_decode($datos['HORA_FIN_SOLICITUD']), 'B', 0, 'C');
$pdf->Ln(9);


//TOTAL DIAS / HORAS PERMISO
$pdf->Cell(15, 6, utf8_decode('Total dias :'), 0, 0, 'L');
$pdf->Cell(20);
$pdf->Cell(40, 5, utf8_decode($datos['TOTAL_DIAS']),'B', 0, 'C');
$pdf->Cell(15, 6, 'Total Horas :', 0, 0, 'R');
$pdf->Cell(30, 5, utf8_decode($datos['TOTAL_HORAS']), 'B', 0, 'C');
$pdf->Cell(10);
$pdf->Cell(15, 6, utf8_decode('Total dias :'), 0, 0, 'L');
$pdf->Cell(20);
$pdf->Cell(40, 5, utf8_decode($datos['TOTAL_DIAS']),'B', 0, 'C');
$pdf->Cell(15, 6, 'Total Horas :', 0, 0, 'R');
$pdf->Cell(30, 5, utf8_decode($datos['TOTAL_HORAS']), 'B', 0, 'C');
$pdf->Ln(9);


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
$usuario     = "eurquidi";

//$nombre_archivo= $tipoDocumento."_".$fechaNombre."_".$horaNombre.'_'.trim($usuario).".pdf";
$nombre_archivo= $idDocumento.'_'.$tipoDocumento."_".$fechaNombre."_".$horaNombre.'_'.trim($idusuario).".pdf";
$pdf->Output($nombre_archivo,$modo); 
exit(); ?><?php /**PATH D:\xampp\htdocs\faboce2023\Modules/RecursosHumanos\Resources/views/reemplazo/pdf.blade.php ENDPATH**/ ?>