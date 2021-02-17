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

// query to insert a row
$query = "INSERT INTO products (id, description, idSupplier, priceBuy, priceSale, stock) VALUES ('T12', 'Tornillos del 12', 'PR1', 2.34, 5.15, 22000);";

insertRow($db, $query);  // call to the function that performs the insert using PDO :: query

// query to insert another row
$query = "INSERT INTO products (id, description, idSupplier, priceBuy, priceSale, stock) VALUES ('T22', 'Tornillos del 22', 'PR1', 4.24, 6.15, 15000);";

insertRow($db, $query);  // call to the function that performs the insert using PDO :: query

// query to insert a third row
$query = "INSERT INTO products (id, description, idSupplier, priceBuy, priceSale, stock) VALUES ('A12', 'Arandelas del 12', 'PR1', 15.40, 25.17, 122000);";

insertRow($db, $query);  // call to the function that performs the insert using PDO :: query

function insertRow($connection, $row)
{
    try {
        $connection->query($row); // The query is executed and it is checked if the row could be inserted
        // The query is displayed on the page, useful in the learning phase
        echo $row . "<br />\n";
        echo "<p>Inserted ROW<p>\n";
        echo "<hr />\n";

    } catch (PDOException $e) {
        echo "<p><strong>NO</strong> Inserted ROW</p>\n";
        print "<p>Error: " . $e->getMessage() . "</p>\n";   // exception message
        exit();
    }
}

?>
