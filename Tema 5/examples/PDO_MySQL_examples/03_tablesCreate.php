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
    $user = "root";  // user to connect with MySQL
    $pass = "";  // user password
    $dbname = "dbPDO";  // database name
    $db = new PDO("mysql:host=localhost; dbname=$dbname", $user, $pass);  // connect to MySQL and Select Database
    echo "<p>You have connected to the database: $dbname.</p>\n";

    if (!createTables($db)) {  // Tables are created by a function
        echo "<p>Problems creating the suppliers and products tables in database: $dbname</p>\n";
    }

    $db = null;  // close connection
    print "<p>... and the connection is closed<p>";
} catch (PDOException $e) {  // If there are connection errors, an object of type PDOException is caught
    print "<p>Error: COULD NOT CONNECT TO THE MySQL SERVER.</p>\n";
    print "<p>Error: " . $e->getMessage() . "</p>\n";  // exception message
    exit();
}

// Function to create the suppliers and products tables
// returns true if both tables are created
// returns false if any table fails
function createTables($connection)
{
    // accessing the declared variable outside the function http://www.php.net/manual/en/language.variables.scope.php
    global $dbname;
    define("LINE", "\n<br>");
    // we assume that the suppliers and products tables will be created without problems
    $suppliersOK = true;
    $productsOK = true;

    // query to create suppliers table.
    // $query = "CREATE TABLE IF NOT EXISTS suppliers (";
    $query = "CREATE TABLE suppliers (";
    $query .= "id CHAR (3), ";
    $query .= "name VARCHAR (40), ";
    $query .= "address VARCHAR (80), ";
    $query .= "phone CHAR (9), ";
    $query .= "city VARCHAR (40), ";
    $query .= "province VARCHAR (20), ";
    $query .= "email VARCHAR (80), ";
    $query .= "PRIMARY KEY (id) ) ";
    $query .= "Engine=InnoDB;";

    if ($connection->query($query)) {  // The query is executed
        echo "<p><strong>suppliers</strong> Table created in database $dbname</p>\n";
        /* The query is displayed on the page. It is not necessary for execution,
           but it is very useful in the learning phase. */
        echo "<b>- suppliers Table query: </b><br />";
        echo $query . LINE . LINE;
    } else {
        echo "<p> The <strong>suppliers</strong> table could not be created in database $dbname</p>\n";
        $suppliersOK = false;  // error creating suppliers table
    }

    // query to create products table.
    // $query = "CREATE TABLE IF NOT EXISTS products (";
    $query = "CREATE TABLE products (";
    $query .= "id CHAR (3), ";
    $query .= "description VARCHAR (50), ";
    $query .= "idSupplier CHAR (3), ";
    $query .= "priceBuy FLOAT, ";
    $query .= "priceSale FLOAT, ";
    $query .= "stock INT, ";
    $query .= "PRIMARY KEY (id), ";
    $query .= "FOREIGN KEY (idSupplier) REFERENCES suppliers(id) ";
    $query .= "ON UPDATE CASCADE ON DELETE RESTRICT) ";
    $query .= "Engine=InnoDB;";

    if ($connection->query($query)) {  // The query is executed
        echo "<p><strong>products</strong> Table created in database $dbname</p>\n";
        /* The query is displayed on the page. It is not necessary for execution,
           but it is very useful in the learning phase. */
        echo "<b>- products Table query: </b><br />";
        echo $query . LINE . LINE;
    } else {
        echo "<p> The <strong>products</strong> table could not be created in database $dbname</p>\n";
        $productsOK = false; // error creating products table
    }
    // returns true if both tables are created; returns false if any table or both fails
    return $suppliersOK && $productsOK;
}

?>
