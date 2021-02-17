<?php
/*
 * FPDF Tutorial 5: Tables
 * The tutorial shows different ways to make tables.
 * http://www.fpdf.org/en/tutorial/tuto5.htm
 *
 * creates a temporary CSV file fruit_tmp.csv
 * fruit table of the fruits database in MySQL
 *
 * IES Virgen del Carmen de Jaén
 * Desarrollo Web en Entorno Servidor 2º DAW
 * Rafael García Cabrera
 *
 */
require_once 'fpdf/fpdf.php';
require_once 'fruit_csv_file.php';

class PDF extends FPDF
{
// Load data
    function LoadData($file)
    {
        // Read file lines
        $lines = file($file);

        $data = array();
        foreach ($lines as $line)
            $data[] = explode(',', trim($line));
        return $data;
    }

// Simple table
    function BasicTable($header, $data)
    {
        // Header
        foreach ($header as $col)
            $this->Cell(40, 7, $col, 1);
        $this->Ln();
        // Data
        foreach ($data as $row) {
            foreach ($row as $col)
                $this->Cell(40, 6, $col, 1);
            $this->Ln();
        }
    }

// set the color of the fruit
// http://www.php.net/manual/es/control-structures.switch.php

    function setFruitColor($color)
    {
        switch ($color) {
            case 'orange':
                $this->SetTextColor(255, 165, 0);
                break;
            case 'green':
                $this->SetTextColor(0, 128, 0);
                break;
            case 'blue':
                $this->SetTextColor(0, 0, 255);
                break;
            case 'yellow':
                $this->SetTextColor(255, 255, 0);
                break;
            case 'purple':
                $this->SetTextColor(128, 0, 128);
                break;
            case 'red':
                $this->SetTextColor(255, 0, 0);
                break;
            default:
                $this->SetTextColor(0, 0, 0);  //black
        }
    }

// Better table
    function ImprovedTable($header, $data)
    {
        // Column widths
        $w = array(40, 35, 45);
        // Header
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        $this->Ln();
        // Data
        foreach ($data as $row) {
            // cell for id column
            $this->Cell($w[0], 6, $row[0], 'LR');
            // cell for name column
            $this->Cell($w[1], 6, $row[1], 'LR');
            // Write the name of the color with that color
            $this->setFruitColor($row[2]);
            // cell for color column
            $this->Cell($w[2], 6, $row[2], 'LR');
            // return text color to black
            $this->SetTextColor(0, 0, 0);  //black

            $this->Ln();
        }
        // Closing line
        $this->Cell(array_sum($w), 0, '', 'T');
    }

// Colored table
    function FancyTable($header, $data)
    {
        // Colors, line width and bold font
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('', 'B');
        // Header
        $w = array(40, 35, 45);
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = false;
        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row[0], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row[1], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, $row[2], 'LR', 0, 'L', $fill);
            $this->Ln();
            $fill = !$fill;
        }
        // Closing line
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}

$pdf = new PDF();
// Column titles
$header = array('id', 'name', 'color');

// The temporary file must be created in a directory on which you have write permissions
$fileName = '/tmp/fruit_tmp.csv';

createFile($fileName);

// Data loading
$data = $pdf->LoadData($fileName);

$pdf->SetFont('Arial', '', 14);  // Text font
$pdf->AddPage();  // page 1
$pdf->BasicTable($header, $data);

$pdf->AddPage();  // page 2
$pdf->ImprovedTable($header, $data);

$pdf->AddPage();  // page 3
$pdf->FancyTable($header, $data);

//deleteFile($fileName); // delete the file that was used to generate the pdf

$pdf->Output();  // show generated pdf in browser
