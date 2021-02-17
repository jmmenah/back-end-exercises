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
 * foreach - The foreach construct provides an easy way to iterate over arrays.
 * http://www.php.net/manual/en/control-structures.foreach.php
 */

-->

<!DOCTYPE html>
<html lang="en">
<title>Data Table using foreach</title>
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
?>
<h1>Data Table using foreach</h1>

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
    // The query is executed and the loop will be repeated as many times as rows the cursor has
    foreach ($db->query($query) as $row) {
        $id = $row['id'];
        $description = $row['description'];
        $priceBuy = $row['priceBuy'];
        ?>
        <!-- A row of the html table is created with the data obtained -->
        <tr>
            <td><?php echo($id); ?></td>
            <td><?php echo($description); ?></td>
            <td><?php echo($priceBuy); ?></td>
        </tr>
        <?php
    }
    ?>
</table>
</body>
</html>
