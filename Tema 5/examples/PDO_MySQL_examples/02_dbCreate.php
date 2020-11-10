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
 */

try {
    $db = new PDO("mysql:host=localhost", "root", "");  // connect to MySQL
    echo "<p>YOU HAVE CONNECTED TO THE MySQL SERVER.</p>\n";
    $dbname = "dbPDO2";  // database name
    $query = "CREATE DATABASE IF NOT EXISTS $dbname;";  // query to create the database

    if ($db->query($query)) {  // The query is executed
        echo "<p>Database created: $dbname</p>\n";
    } else {
        echo "<p>The database could not be created: $dbname</p>\n";
    }
    $db = null;  // close connection
    print "<p>... and the connection is closed</p>";
} catch (PDOException $e) {  // If there are connection errors, an object of type PDOException is caught
    print "<p>Error: COULD NOT CONNECT TO THE MySQL SERVER.</p>\n";
    print "<p>Error: " . $e->getMessage() . "</p>\n";  // exception message
    exit();
}
?>
