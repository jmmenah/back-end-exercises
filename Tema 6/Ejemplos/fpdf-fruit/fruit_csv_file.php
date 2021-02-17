<?php
/*
 * IES Virgen del Carmen de Jaén
 * Desarrollo Web en Entorno Servidor 2º DAW
 * Rafael García Cabrera
 *
 * fopen — Opens file or URL
 * http://www.php.net/manual/en/function.fopen.php
 *
 * fputcsv — Format line as CSV and write to file pointer
 * http://www.php.net/manual/en/function.fputcsv.php
 *
 * PDOStatement::fetch — Fetches the next row from a result set
 * http://www.php.net/manual/en/pdostatement.fetch.php
 *
 * fclose — Closes an open file pointer
 * http://www.php.net/manual/en/function.fclose.php
 *
 * unlink — Deletes a file
 * http://www.php.net/manual/en/function.unlink.php
 */

function fruitsConnect()
{
    try {
        $db = new PDO("mysql:host=localhost; dbname=fruits", "root", "root");
        return ($db);
    } catch (PDOException $e) {
        print "<p>Error: Error: Could not connect to MySQL.</p>\n";
        print "<p>Error: " . $e->getMessage() . "</p>\n";
        exit();
    }
}

function createFile($file)
{
    $db = fruitsConnect();

    // create a file pointer connected to the output stream
    $output = fopen($file, 'w');

    $rows = $db->query('SELECT * FROM fruit');

    while ($row = $rows->fetch(PDO::FETCH_NUM)) fputcsv($output, $row);

    fclose($output);
}

function deleteFile($file)
{
    unlink($file);
}
