<!--
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
 * PDOStatement::fetch — Fetches the next row from a result set
 * http://php.net/manual/en/pdostatement.fetch.php
 */
-->

<!DOCTYPE html>
<html lang="en">
<title>Data Table using while</title>
<style>
    table, th, td {
        border: 2px solid black;
        border-collapse: collapse;
        padding: 5px;
    }
</style>
</head>
<body>
<?php
// script that establishes the connection with MySQL and selects the database
require("useDB.php");

// A select query is created
$query = "SELECT id, description, priceBuy FROM products WHERE priceBuy < 10.00;";

// The query is executed
$doQuery = $db->query($query);
?>
<h1>Data Table using while</h1>

<table>
    <tr>
        <th colspan="3">List of products under 10 €</th>
    </tr>
    <tr>
        <th>id</th>
        <th>Description</th>
        <th>Buy Price</th>
    </tr>
    <?php
    // The cursor is traversed, as long as there are rows, retrieving each one
    while ($row = $doQuery->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>\n\t\t<td>" . $row["id"] . "</td>\n";
        echo "\t\t<td>" . $row["description"] . "</td>\n";
        echo "\t\t<td>" . $row["priceBuy"] . "</td>\n\t</tr>\n";
    }
    ?>
</table>
</body>
</html>
