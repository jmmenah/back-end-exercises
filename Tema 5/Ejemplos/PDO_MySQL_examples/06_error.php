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
 * Connections and Connection management
 * http://www.php.net/manual/en/pdo.connections.php
 *
 * PDO::query — Executes an SQL statement, returning a result set as a PDOStatement object
 * http://www.php.net/manual/en/pdo.query.php
 *
 * PDO::errorCode — Fetch the SQLSTATE associated with the last operation on the database handle
 * http://php.net/manual/en/pdo.errorcode.php
 *
 * PDO::errorInfo — Fetch extended error information associated with the last operation on the database handle
 * http://www.php.net/manual/en/pdo.errorinfo.php
 */


// script that establishes the connection with MySQL and selects the database
require("useDB.php");

// prevents an exception of type PDOException from being thrown
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

// Wrong query to cause the error
$query = "INSERT INTO suppliers (id, name, address, phone, city, province, email) VALUES ();";

// The query is displayed on the page, useful in the learning phase
echo $query . "<br />";

// The query is executed
$doQuery = $db->query($query);

// displays information about the error
echo "<p>The error number is: <b>" . $db->errorCode() . "</b></p>\n";
echo "<p>The error description is: <b><pre>";
print_r($db->errorInfo());
echo "</b></pre></p>\n";

?>
