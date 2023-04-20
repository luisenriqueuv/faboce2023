<?php

namespace Modules\RecursosHumanos\Services\PDF\Reemplazo;

use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Support\Str;

class ReemplazoPDF extends Fpdf
{
    private $_data;

    public function __construct()
    {
        parent::__construct('L', 'mm', 'letter');
//        $this->_data = $data;
    }

    public function Header()
    {
        $image_file = 'images/faboce2.png';
        $x1 = $this->GetX();
        $y1 = $this->GetY();
        $this->Cell(5);
        $this->Cell(30, 10, '', 1, 0, 'C', $this->Image($image_file, 17, 12, 25, 6));
        // DETALLE
        $this->SetFont('Arial', 'B', 10);
        $x2 = $this->GetX();
        $y2 = $this->GetY();
        $this->MultiCell(70, 10, 'SALIDA DE PERSONAL', 1, 'C');
        $this->SetFont('Arial', 'B', 7);
        $this->setXY($x2 + 70, $y2);
        $x3 = $this->GetX();
        $y3 = $this->GetY();
        $this->Cell(20, 5, 'FD - 300 - 16', 1, 1, 'C');
        $this->setXY($x2 + 70, $y2 + 5);
        $x4 = $this->GetX();
        $y4 = $this->GetY();
        $this->Cell(20, 5, iconv('UTF-8', 'windows-1252', 'REVISIÓN - 1'), 1, 1, 'C');
        $this->ln(2);

        $this->setXY($x1 + 135, $y1);
        $this->Cell(30, 10, '', 1, 0, 'C', $this->Image($image_file, $x1 + 137, 12, 25, 6));
        // DETALLE
        $this->SetFont('Arial', 'B', 10);
        $this->setXY($x2 + 130, $y2);
        $this->MultiCell(70, 10, 'SALIDA DE PERSONAL', 1, 'C');
        $this->SetFont('Arial', 'B', 7);
        $this->setXY($x3 + 130, $y3);
        $this->Cell(20, 5, 'FD - 300 - 16', 1, 1, 'C');
        $this->setXY($x4 + 130, $y4);
        $this->Cell(20, 5, iconv('UTF-8', 'windows-1252', 'REVISIÓN - 1'), 1, 1, 'C');
        $this->ln(2);
    }
    public function Footer()
    {
        /*
        $this->SetY(-75);
        $this->Cell(120, 5, iconv('UTF-8', 'windows-1252', 'OBSERVACIÓN'), '', 0, 'L');
        $this->Cell(10);
        $this->Cell(120, 5, iconv('UTF-8', 'windows-1252', 'OBSERVACIÓN'), '', 0, 'L');
        $this->Ln();
        $this->SetFont('Arial', '', 7);
        $this->Cell(120, 5, Str::limit("is simply dummy texince the 1500s", 100), 'B', 0, 'L');
        $this->Cell(10);
        $this->Cell(120, 5, Str::limit("is sird dummy text ever since the 1500s", 100), 'B', 0, 'L');
*/
        // ------------- FIRMAS ---------------------------------
        $this->SetY(-60);

        $this->SetFont('Arial', 'I', 7);
        $this->Cell(5);
        $this->Cell(50, 6, iconv('UTF-8', 'windows-1252', 'Jefe de Sección'), 0, 0, 'C');
        $this->Cell(10);
        $this->Cell(50, 6, iconv('UTF-8', 'windows-1252', 'Producción'), 0, 0, 'C');
        $this->Cell(20);
        $this->Cell(50, 6, iconv('UTF-8', 'windows-1252', 'Jefe de Sección'), 0, 0, 'C');
        $this->Cell(10);
        $this->Cell(50, 6, iconv('UTF-8', 'windows-1252', 'Producción'), 0, 0, 'C');
        $this->Ln();
        
        $this->SetFont('Arial', 'B', 7);
        $this->Cell(5);
        $this->Cell(50, 6, iconv('UTF-8', 'windows-1252', 'JEFE DE SECCIÓN'), 'T', 0, 'C');
        $this->Cell(10);
        $this->Cell(50, 6, iconv('UTF-8', 'windows-1252', 'PRODUCCIÓN'), 'T', 0, 'C');
        $this->Cell(20);
        $this->Cell(50, 6, iconv('UTF-8', 'windows-1252', 'JEFE DE SECCIÓN'), 'T', 0, 'C');
        $this->Cell(10);
        $this->Cell(50, 6, iconv('UTF-8', 'windows-1252', 'PRODUCCIÓN'), 'T', 0, 'C');
        $this->Ln(15);

        $this->SetFont('Arial', 'I', 7);
        $this->Cell(5);
        $this->Cell(50, 6, 'V.B. Recursos Humanos', 0, 0, 'C');
        $this->Cell(10);
        $this->Cell(50, 6, iconv('UTF-8', 'windows-1252', 'V.B. Administración'), 0, 0, 'C');
        $this->Cell(20);
        $this->Cell(50, 6, 'V.B. Recursos Humanos', 0, 0, 'C');
        $this->Cell(10);
        $this->Cell(50, 6, iconv('UTF-8', 'windows-1252', 'V.B. Administración'), 0, 0, 'C');
        $this->Ln();

        $this->SetFont('Arial', 'B', 7);
        $this->Cell(5);
        $this->Cell(50, 6, 'V.B. RECURSOS HUMANOS', 'T', 0, 'C');
        $this->Cell(10);
        $this->Cell(50, 6, iconv('UTF-8', 'windows-1252', 'V.B. ADMINISTRACIÓN'), 'T', 0, 'C');
        $this->Cell(20);
        $this->Cell(50, 6, 'V.B. RECURSOS HUMANOS', 'T', 0, 'C');
        $this->Cell(10);
        $this->Cell(50, 6, iconv('UTF-8', 'windows-1252', 'V.B. ADMINISTRACIÓN'), 'T', 0, 'C');
        $this->Ln(15);

        $this->SetFont('Arial', 'I', 7);
        $this->Cell(65);
        $this->Cell(50, 6, 'Trabajador', 0, 0, 'C');
        $this->Cell(80);
        $this->Cell(50, 6, 'Trabajador', 0, 0, 'C');
        $this->Ln();
        $this->SetFont('Arial', 'B', 7);
        $this->Cell(65);
        $this->Cell(50, 6, 'TRABAJADOR', 'T', 0, 'C');
        $this->SetFont('Arial', 'B', 7);
        $this->Cell(80);
        $this->Cell(50, 6, 'TRABAJADOR', 'T', 0, 'C');

        /*
        $this->SetFont('Arial', 'B', 7);
        $this->Cell(5);
        $this->Cell(30, 6, iconv('UTF-8', 'windows-1252', 'SALDO VACACIÓN'), 0, 0, 'L');
        $this->Cell(10, 6, 'SALDO', 1, 0, 'C');
        $this->Cell(20);
        $this->Cell(50, 6, 'TRABAJADOR', 'T', 0, 'C');
        $this->Cell(20);
        $this->Cell(30, 6, iconv('UTF-8', 'windows-1252', 'SALDO VACACIÓN'), 0, 0, 'L');
        $this->Cell(10, 6, 'SALDO', 1, 0, 'C');
*/

        $this->SetY(-8);
        $this->SetFont('Arial', 'I', 7);
        $this->Cell(120, 8, iconv('UTF-8', 'windows-1252', 'Página ') . $this->PageNo() . ' de {nb}', 0, 0, 'C');
        $this->Cell(10);
        $this->Cell(120, 8, iconv('UTF-8', 'windows-1252', 'Página ') . $this->PageNo() . ' de {nb}', 0, 0, 'C');
    }
}