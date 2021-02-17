<?php
/**
 * IES Virgen del Carmen de Jaén
 * Desarrollo Web en Entorno Servidor 2º DAW
 * Rafael García Cabrera
 */

function pageTop($title)
{
    print "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <meta name='author' content='Rafael García Cabrera' />
    <title>$title</title>
    <style>
      table, th, td {border: 1px solid black; font-size: 1.5em;}
    </style>
</head>
<body>
<h1>$title</h1>\n";
}

function pageBottom($date = "Friday, November 27, 2020")
{

    print "<pre>
  Desarrollo Web en Entorno Servidor 2º DAW
  IES Virgen del Carmen de Jaén
  last modification: $date (Rafael García Cabrera)
</pre>
</body>
</html>";
}

function fruitsConnect()
{
    try {
        $db = new PDO("mysql:host=localhost; dbname=fruits", "root", "");
        return ($db);
    } catch (PDOException $e) {
        print "<p>Error: Error: Could not connect to MySQL.</p>\n";
        print "<p>Error: " . $e->getMessage() . "</p>\n";
        exit();
    }
}