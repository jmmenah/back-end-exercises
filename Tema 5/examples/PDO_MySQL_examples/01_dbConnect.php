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
 * About closing MySQL connections
 * Upon successful connection to the database, an instance of the PDO class is returned to your script.
 * The connection remains active for the lifetime of that PDO object. To close the connection, you need to destroy
 * the object by ensuring that all remaining references to it are deleted—you do this by assigning NULL to the
 * variable that holds the object.
 * If you don't do this explicitly, PHP will automatically close the connection when your script ends.
 */

try {
    $user = "root";  // user to connect with MySQL
    $pass = "";  // user password
    $db = new PDO("mysql:host=localhost", $user, $pass);  // connect to MySQL
    echo "<p>YOU HAVE CONNECTED TO THE MySQL SERVER.</p>\n";
    $db = null;  // close connection
    print "<p>... and the connection is closed</p>";
} catch (PDOException $e) {  // If there are connection errors, an object of type PDOException is caught
    print "<p>Error: COULD NOT CONNECT TO THE MySQL SERVER.</p>\n";
    print "<p>Error: " . $e->getMessage() . "</p>\n";  // exception message
    exit();
}
?>
