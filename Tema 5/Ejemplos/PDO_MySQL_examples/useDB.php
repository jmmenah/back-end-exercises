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
 * Exceptions 
 * http://php.net/manual/en/language.exceptions.php
 *
 * Errors and error handling
 * http://www.php.net/manual/en/pdo.error-handling.php
 *
 * Exception::getMessage — Gets the Exception message
 * http://php.net/manual/en/exception.getmessage.php
 *
 * exit — Output a message and terminate the current script
 * http://php.net/manual/en/function.exit.php
 *
 * die — Equivalent to exit
 * http://php.net/manual/en/function.die.php
 */

/* 
 * PDO offers you a choice of 3 different error handling strategies, to fit your style of application development.
 * PDO::ERRMODE_SILENT  
 *   This is the default mode. PDO will simply set the error code for you to inspect using the PDO::errorCode() and
 *   PDO::errorInfo() methods on both the statement and database objects.
 * PDO::ERRMODE_WARNING  
 *   In addition to setting the error code, PDO will emit a traditional E_WARNING message.
 * PDO::ERRMODE_EXCEPTION
 *   In addition to setting the error code, PDO will throw a PDOException.
 */

try {
    $user = "root";  // user to connect with MySQL
    $pass = "";  // user password
    $dbname = "dbPDO";  // database name
    $host = "localhost";  // host name or IP

    $db = new PDO("mysql:host=$host; dbname=$dbname", $user, $pass);  // connect to MySQL and Select Database

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // Handling errors with PDOException
    echo "<p>You have connected to database: $dbname.</p>\n";
} catch (PDOException $e) {  // // If there are connection errors, an object of type PDOException is caught
    print "<p>Error: Could not connect to database: $dbname.</p>\n";
    print "<p>Error: " . $e->getMessage() . "</p>\n";  // exception message
    exit();
}
?>
