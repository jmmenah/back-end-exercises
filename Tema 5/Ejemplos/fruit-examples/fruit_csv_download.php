<?php
/*
 * PHP example that creates a CSV file ready to download
 * fruit table of the fruits database in MySQL
 *
 * IES Virgen del Carmen de Jaén
 * Desarrollo Web en Entorno Servidor 2º DAW
 * Rafael García Cabrera
 *
 * References:
 * Creating downloadable CSV files using PHP
 * http://code.stephenmorley.org/php/creating-downloadable-csv-files/
 *
 * header — Send a raw HTTP header 
 * http://www.php.net/manual/en/function.header.php
 *
 * fopen — Opens file or URL
 * http://www.php.net/manual/en/function.fopen.php
 *
 * fputcsv — Format line as CSV and write to file pointer
 * http://www.php.net/manual/en/function.fputcsv.php
 *
 * PDOStatement::fetch — Fetches the next row from a result set
 * http://www.php.net/manual/en/pdostatement.fetch.php
 */

require_once "fruits_functions.php";

$db = fruitsConnect();

// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=fruit.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('id', 'name', 'color'));

// executes the query
$rows = $db->query('SELECT * FROM fruit');

// loop over the rows, outputting them
// Watch out! if FETCH_BOTH is used instead of FETCH_NUM or FETCH_ASSOC, the columns are duplicated
while ($row = $rows->fetch(PDO::FETCH_NUM)) fputcsv($output, $row);