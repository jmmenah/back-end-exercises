<?php
/* FPDF Table with MySQL
 * Author: Olivier
 * License: FPDF 
 * http://www.fpdf.org/en/script/script14.php
 *
 * IES Virgen del Carmen de Jaén
 * Desarrollo Web en Entorno Servidor 2º DAW
 * Rafael García Cabrera
 */

require('mysql_table.php');

class PDF extends PDF_MySQL_Table
{
    function Header()
    {
        // Title
        $this->SetFont('Arial', '', 18);
        $this->Cell(0, 6, 'Nombres Más Frecuentes 2019', 0, 1, 'C');
        $this->Ln(10);
        // Ensure table header is printed
        parent::Header();
    }

    function Footer()
    {
        // Go to 1.5 cm from bottom
        $this->SetY(-15);
        // Select Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Print centered page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}


// Connect to database
//$link = mysqli_connect('localhost','root','root','test');
$link = new PDO('sqlite:'.__DIR__.'/nombres.db');

$pdf = new PDF();
$pdf->AddPage();
// First table: output all columns
$pdf->Table($link, 'select * from nombres order by nombre');
$pdf->AddPage();
// Second table: specify 3 columns
$pdf->AddCol('Sexo', 20, '', 'C');
$pdf->AddCol('Nombre', 40, 'Nombre');
$pdf->AddCol('frecuencia', 40, 'Frecuencia', 'R');
$prop = array('HeaderColor' => array(255, 150, 100),
    'color1' => array(210, 245, 255),
    'color2' => array(255, 255, 210),
    'padding' => 2);
$pdf->Table($link, 'select sexo, nombre,format(frecuencia*1000,0) as frecuencia from nombres order by frecuencia limit 0,10', $prop);
$pdf->Output();
?>
