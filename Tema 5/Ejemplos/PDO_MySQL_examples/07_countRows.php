<?php
/*
 * Based on the Example from the book:
 * DOMINE PHP Y MYSQL. PROGRAMACIÓN DINÁMICA EN EL LADO DEL SERVIDOR.
 * LOPEZ QUIJADO, JOSÉ
 * RA-MA, 2006
 *
 * Modifications to use PDO (PHP Data Objects)
 * The example in the book uses the original MySQL API (deprecated in PHP 5.5.0, and removed in PHP 7.0.0)
 */

/*
 * PDO (PHP Data Objects)
 * http://www.php.net/manual/en/book.pdo.php
 *
 * PDO::query — Executes an SQL statement, returning a result set as a PDOStatement object
 * http://www.php.net/manual/en/pdo.query.php
 *
 * PDOStatement::rowCount — Returns the number of rows affected by the last SQL statement
 * http://php.net/manual/en/pdostatement.rowcount.php
 */

// script that establishes the connection with MySQL and selects the database
require("useDB.php");

// A select query is created
$query = "SELECT * FROM products WHERE priceBuy < 10.00;";

// The query is displayed on the page, useful in the learning phase
echo($query . "<br />");
echo "<hr />\n";

// The query is executed
$doQuery = $db->query($query);

// Get the number of rows from the cursor
$rowsNumber = $doQuery->rowCount();

echo "<p>Number of rows: $rowsNumber.</p>\n";
?>
