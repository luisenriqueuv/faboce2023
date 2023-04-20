<?php

use Modules\RecursosHumanos\Services\PDF\SalidaPersonal\VacacionPDF;

$data = [
    'SALDO' => $vacacion->kardex ? $vacacion->kardex->SALDO : 0,
];

$pdf = new VacacionPDF($data);
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetTitle('Boleta de Compensacion');
$pdf->SetFillColor(230, 230, 230);
$pdf->SetLeftMargin(15);

// ID
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(98, 7, 'Nro.:', 0, 0, 'R');
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(15, 7, $vacacion->ID, 0, 0, 'L');
$pdf->Cell(17);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(98, 7, 'Nro.:', 0, 0, 'R');
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(15, 7, $vacacion->ID, 0, 0, 'L');
$pdf->Ln();

// ------------- DATOS TRABAJADOR ----------------------
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(120, 6, 'DATOS TRABAJADOR:', 1, 0, 'L', true);
$pdf->Cell(10);
$pdf->Cell(120, 6, 'DATOS TRABAJADOR:', 1, 0, 'L', true);
$pdf->Ln(8);

$pdf->SetFont('Arial', '', 7);
$pdf->Cell(15, 6, 'Nombre:', 0, 0, 'L');
$pdf->Cell(105, 5, utf8_decode($vacacion->personal->NOMBRE . ' ' . $vacacion->personal->APELLIDO), 'B', 0, 'L');
$pdf->Cell(10);
$pdf->Cell(15, 6, 'Nombre:', 0, 0, 'L');
$pdf->Cell(105, 5, utf8_decode($vacacion->personal->NOMBRE . ' ' . $vacacion->personal->APELLIDO), 'B', 0, 'L');
$pdf->Ln(6);

// FECHA
$pdf->Cell(15, 6, utf8_decode('Sección:'), 0, 0, 'L');
$pdf->Cell(70, 5, utf8_decode($vacacion->SECCION), 'B', 0, 'L');
$pdf->Cell(15, 6, 'Fecha:', 0, 0, 'R');
$pdf->Cell(20, 5, utf8_decode(date('d/m/Y', strtotime($vacacion->FECHA))), 'B', 0, 'C');
$pdf->Cell(10);
$pdf->Cell(15, 6, utf8_decode('Sección:'), 0, 0, 'L');
$pdf->Cell(70, 5, utf8_decode($vacacion->SECCION), 'B', 0, 'L');
$pdf->Cell(15, 6, 'Fecha:', 0, 0, 'R');
$pdf->Cell(20, 5, utf8_decode(date('d/m/Y', strtotime($vacacion->FECHA))), 'B', 0, 'C');
$pdf->Ln(9);

// ------------- RAZÓN DE SOLICITANTE -----------------------
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(40, 6, 'MOTIVO DE SALIDA:', 'TBL', 0, 'L', true);
$pdf->SetFont('Arial', 'IB', 8);
$pdf->Cell(80, 6, utf8_decode('COMPENSACION'), 'TBR', 0, 'L', true);
$pdf->Cell(10);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(40, 6, 'MOTIVO DE SALIDA:', 'TBL', 0, 'L', true);
$pdf->SetFont('Arial', 'IB', 8);
$pdf->Cell(80, 6, utf8_decode('COMPENSACION'), 'TBR', 0, 'L', true);
$pdf->Ln(9);

// OBSERVACIONES
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(50, 4, 'FECHA Y HORA INICIAL', 'TL', 0, 'C', true);
$pdf->Cell(50, 4, 'FECHA Y HORA FINAL', 'TL', 0, 'C', true);
$pdf->Cell(20, 8, 'DIAS', 1, 0, 'C', true);
$pdf->Cell(10);
$pdf->Cell(50, 4, 'FECHA Y HORA INICIAL', 'TL', 0, 'C', true);
$pdf->Cell(50, 4, 'FECHA Y HORA FINAL', 'TL', 0, 'C', true);
$pdf->Cell(20, 8, 'DIAS', 1, 0, 'C', true);
$pdf->Ln(4);

$pdf->Cell(15, 4, 'FECHA', 'BL', 0, 'C', true);
$pdf->Cell(5, 4, '', 'B', 0, 'C', true);
$pdf->Cell(15, 4, 'HORA I', 'B', 0, 'C', true);
$pdf->Cell(15, 4, 'HORA F', 'BR', 0, 'C', true);
$pdf->Cell(15, 4, 'FECHA', 'BL', 0, 'C', true);
$pdf->Cell(5, 4, '', 'B', 0, 'C', true);
$pdf->Cell(15, 4, 'HORA I', 'B', 0, 'C', true);
$pdf->Cell(15, 4, 'HORA F', 'BR', 0, 'C', true);
$pdf->Cell(30);
$pdf->Cell(15, 4, 'FECHA', 'BL', 0, 'C', true);
$pdf->Cell(5, 4, '', 'B', 0, 'C', true);
$pdf->Cell(15, 4, 'HORA I', 'B', 0, 'C', true);
$pdf->Cell(15, 4, 'HORA F', 'BR', 0, 'C', true);
$pdf->Cell(15, 4, 'FECHA', 'BL', 0, 'C', true);
$pdf->Cell(5, 4, '', 'B', 0, 'C', true);
$pdf->Cell(15, 4, 'HORA I', 'B', 0, 'C', true);
$pdf->Cell(15, 4, 'HORA F', 'BR', 0, 'C', true);
$pdf->Ln();

$sum = 0;
$pdf->SetFont('Arial', '', 7);

foreach ($vacacion->vacacion1 as $value) {
    $pdf->Cell(15, 5, date('d/m/Y', strtotime($value->FECHAI)), 'B', 0, 'C');
    if ($value->MEDIODIAI == 'on') {
        $pdf->SetFont('ZapfDingbats', '', 7);
        $pdf->Cell(5, 5, '4', 'B', 0, 'C');
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(15, 5, date('H:i', strtotime($value->HORAI1)), 'B', 0, 'C');
        $pdf->Cell(15, 5, date('H:i', strtotime($value->HORAI2)), 'B', 0, 'C');
    } else {
        $pdf->Cell(5, 5, '', 'B', 0, 'C');
        $pdf->Cell(15, 5, '', 'B', 0, 'C');
        $pdf->Cell(15, 5, '', 'B', 0, 'C');
    }

    if ($value->FECHAI == $value->FECHAF) {
        $pdf->Cell(50, 5, '', 'B', 0, 'C');
    } else {
        $pdf->Cell(15, 5, date('d/m/Y', strtotime($value->FECHAF)), 'B', 0, 'C');
        if ($value->MEDIODIAF == 'on') {
            $pdf->SetFont('ZapfDingbats', '', 7);
            $pdf->Cell(5, 5, '4', 'B', 0, 'C');
            $pdf->SetFont('Arial', '', 7);
            $pdf->Cell(15, 5, date('H:i', strtotime($value->HORAF1)), 'B', 0, 'C');
            $pdf->Cell(15, 5, date('H:i', strtotime($value->HORAF2)), 'B', 0, 'C');
        } else {
            $pdf->Cell(35, 5, '', 'B', 0, 'C');
        }
    }
    $pdf->Cell(15, 5, number_format($value->DIAS, 1), 'B', 0, 'R');
    $pdf->Cell(5, 5, '', 'B', 0, 'C');
    $sum += $value->DIAS;

    $pdf->Cell(10);

    $pdf->Cell(15, 5, date('d/m/Y', strtotime($value->FECHAI)), 'B', 0, 'C');
    if ($value->MEDIODIAI == 'on') {
        $pdf->SetFont('ZapfDingbats', '', 7);
        $pdf->Cell(5, 5, '4', 'B', 0, 'C');
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(15, 5, date('H:i', strtotime($value->HORAI1)), 'B', 0, 'C');
        $pdf->Cell(15, 5, date('H:i', strtotime($value->HORAI2)), 'B', 0, 'C');
    } else {
        $pdf->Cell(35, 5, '', 'B', 0, 'C');
    }

    if ($value->FECHAI == $value->FECHAF) {
        $pdf->Cell(50, 5, '', 'B', 0, 'C');
    } else {
        $pdf->Cell(15, 5, date('d/m/Y', strtotime($value->FECHAF)), 'B', 0, 'C');
        if ($value->MEDIODIAF == 'on') {
            $pdf->SetFont('ZapfDingbats', '', 7);
            $pdf->Cell(5, 5, '4', 'B', 0, 'C');
            $pdf->SetFont('Arial', '', 7);
            $pdf->Cell(15, 5, date('H:i', strtotime($value->HORAF1)), 'B', 0, 'C');
            $pdf->Cell(15, 5, date('H:i', strtotime($value->HORAF2)), 'B', 0, 'C');
        } else {
            $pdf->Cell(35, 5, '', 'B', 0, 'C');
        }
    }
    $pdf->Cell(15, 5, number_format($value->DIAS, 1), 'B', 0, 'R');
    $pdf->Cell(5, 5, '', 'B', 0, 'C');

    $pdf->Ln();
}

$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(100, 5, utf8_decode('TOTAL DÍAS'), '', 0, 'R');
$pdf->Cell(15, 5, number_format($sum, 1), 'B', 0, 'R');
$pdf->Cell(5, 5, '', 'B', 0, 'C');
$pdf->Cell(10);
$pdf->Cell(100, 5, utf8_decode('TOTAL DÍAS'), '', 0, 'R');
$pdf->Cell(15, 5, number_format($sum, 1), 'B', 0, 'R');
$pdf->Cell(5, 5, '', 'B', 0, 'C');

$pdf->Output();
exit(); ?><?php /**PATH C:\xampp\htdocs\faboce2023\Modules/RecursosHumanos\Resources/views/compensacion/pdf.blade.php ENDPATH**/ ?>