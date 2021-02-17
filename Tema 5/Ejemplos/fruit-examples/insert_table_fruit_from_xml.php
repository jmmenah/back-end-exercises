<?php
/**
 * PHP example to insert rows into a MySQL table using PDO-prepared statements
 * the data to be inserted comes from an XML document using DOM
 * see fruits_xml_html5.php
 *
 * IES Virgen del Carmen de Jaén
 * Desarrollo Web en Entorno Servidor 2º DAW
 * Rafael García Cabrera
 *
 * References:
 * http://www.php.net/manual/en/book.pdo.php
 * http://php.net/manual/en/book.dom.php
 * http://www.w3schools.com/php/php_xml_dom.asp
 * http://www.chilkatsoft.com/data/fruitRecordsSort.xml
 *
 * Prepared statements
 * http://www.php.net/manual/en/pdo.prepared-statements.php
 *
 * PDO::prepare — Prepares a statement for execution and returns a statement object
 * http://php.net/manual/en/pdo.prepare.php
 *
 * PDOStatement::bindParam — Binds a parameter to the specified variable name
 * http://php.net/manual/en/pdostatement.bindparam.php
 *
 * PDOStatement::execute —  Executes a prepared statement
 * http://php.net/manual/en/pdostatement.execute.php
 */

include_once("fruits_functions.php");

function dbConnect()
{
    try {
        $db = new PDO("mysql:host=localhost", "root", "");
        return ($db);
    } catch (PDOException $e) {
        print "<p>Error: Error: Could not connect to MySQL.</p>\n";
        print "<p>Error: " . $e->getMessage() . "</p>\n";
        pageBottom();
        exit();
    }
}

pageTop("PHP example to insert rows into a MySQL table using PDO-prepared statements");

$db = dbConnect(); // connect to MySQL

// Create database
$query = "CREATE DATABASE IF NOT EXISTS fruits";

if ($db->query($query)) {
    echo "<p><strong>fruits</strong> database created.</p>\n";
} else {
    echo "<p><strong>fruits</strong> database could not be created.</p>\n";
    pageBottom();
    exit();
}

// Create table
$query = "CREATE TABLE IF NOT EXISTS fruits.fruit (
id smallint unsigned NOT NULL,
name varchar(20) NOT NULL,
color varchar(20) NOT NULL,
PRIMARY KEY  (id)
);";

if ($db->query($query)) {
    echo "<p><strong>fruit Table</strong> created in fruits database.</p>\n";
} else {
    echo "<p><strong>fruit Table</strong> could not be created in fruits database.</p>\n";
    pageBottom();
    exit();
}

// Insert table rows from XML document data
// using prepared statements

$xmlDoc = new DOMDocument();

// Load a xml document from URL
$xmlDoc->load("http://www.chilkatsoft.com/data/fruitRecordsSort.xml");

$n = $xmlDoc->getElementsByTagName('name');
$c = $xmlDoc->getElementsByTagName('color');

// Prepares a statement for execution and returns a statement object
$stmt = $db->prepare("INSERT INTO fruits.fruit (id, name, color) VALUES (:id, :name, :color)");

// Binds a parameter to the specified variable name
$stmt->bindParam(':id', $id);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':color', $color);

// loop through all name and color elements
// the xml document has the same number of color tags as name tags
for ($i = 0; $i <= $n->length - 1; $i++) {
    // values for binded variables
    $id = $i + 1;
    $name = $n->item($i)->nodeValue;
    $color = $c->item($i)->nodeValue;

    // Executes a prepared statement
    if ($stmt->execute()) {
        echo "<p><strong>Row " . $id . "</strong> ($name, $color)  inserted in fruit table.</p>\n";
    } else {
        echo "<p><strong>Row " . $id . " ($name, $color) NOT inserted</strong> in fruit table.</p>\n";
    }
}

pageBottom();