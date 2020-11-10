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
 * Exceptions
 * http://php.net/manual/en/language.exceptions.php
 *
 * Exception::getMessage — Gets the Exception message
 * http://php.net/manual/en/exception.getmessage.php
 *
 * Errors and error handling
 * http://www.php.net/manual/en/pdo.error-handling.php
 *
 * exit — Output a message and terminate the current script
 * http://php.net/manual/en/function.exit.php
 */


// script that establishes the connection with MySQL and selects the database
require("useDB.php");

// prevents an exception of type PDOException from being thrown
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

// query to insert a row
$query = "INSERT INTO suppliers (id, name, address, phone, city, province, email) 
          VALUES ('PR1', 'ACEROS DUROS, S.A.', 'CL Piedras Blancas, 67', '919998877', 'Fuenlabrada', 'MADRID', 'ventas@acerosduros.org');";

// The query is displayed on the page, useful in the learning phase
echo $query . "<br />";

// The query is executed and it is checked if the row could be inserted
if ($db->query($query)) {
    echo "<p>Inserted ROW</p>\n";
} else {
    echo "<p><strong>NO</strong> Inserted ROW</p>\n";
}
?>
