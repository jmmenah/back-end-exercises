<?php
/**
 * Example to display HTML tables getting data for cells from MysQL fruits.fruit table
 *
 * HTML Tables are displayed in vertical and horizontal format
 * Notice the html code generated using \n to make it human readable ;-)
 *
 * IES Virgen del Carmen de Jaén
 * Desarrollo Web en Entorno Servidor 2º DAW
 * Rafael García Cabrera
 *
 * References:
 * see insert_table_fruit_from_xml.php
 *
 * Prepared statements
 * http://www.php.net/manual/en/pdo.prepared-statements.php
 * PDO::prepare — Prepares a statement for execution and returns a statement object
 * http://php.net/manual/en/pdo.prepare.php
 * PDOStatement::execute —  Executes a prepared statement
 * http://php.net/manual/en/pdostatement.execute.php
 * PDOStatement::fetchAll — Returns an array containing all of the result set rows
 * http://www.php.net/manual/en/pdostatement.fetchall.php
 * PDOStatement::fetch — Fetches the next row from a result set
 * http://www.php.net/manual/en/pdostatement.fetch.php
 *
 */

require_once "fruits_functions.php";

pageTop("HTML tables getting data for cells from MysQL fruits.fruit table - 1");

$db = fruitsConnect();

echo "<h2>fruits.fruit table in Vertical format:</h2>\n";

// HTML table in Vertical format using the heredoc syntax
// http://php.net/manual/en/language.types.string.php#language.types.string.syntax.heredoc
echo <<<TABLE
<table>
  <tr>
    <th>fruit</th>
    <th>color</th>
    <th>id</th>
  </tr>
TABLE;

$query = "SELECT * FROM fruits.fruit";
$stmt = $db->prepare($query);
$stmt->execute();

// Loop through the rows returned in the previously executed statement and create the table rows
// foreach loop is used http://www.php.net/manual/en/control-structures.foreach.php
// It could also be done as shown in horizontal table below with while loop

foreach ($stmt->fetchAll() as $row) {
    echo "\n  <tr>\n    <td>" . $row['name'] . "</td>\n";
    echo "    <td style='color:" . $row['color'] . "; padding: 10px;'>" . $row['color'] . "</td>\n";
    echo "    <td style='padding: 10px;'>" . $row['id'] . "</td>\n  </tr>";
}

// closing vertical table
echo "\n</table>\n";

echo "<h2>fruits.fruit table in Horizontal format:</h2>\n";

//  HTML table in Horizontal format
echo "<table style='text-align:center;'>\n";

// html table rows
$row_fruit = "  <tr>\n    <th>fruit</th>\n";
$row_color = "  <tr>\n    <th>color</th>\n";
$row_id = "  <tr>\n    <th>id</th>\n";

// Execute the previously prepared sentence again.
// Note that the above loop ended because all the rows returned by the prepared query had been traversed
$stmt->execute();

// Loop through the rows returned in the statement just executed and create the table cells
// while loop is used http://www.php.net/manual/en/control-structures.while.php
// It could also be done as shown in the vertical table above with foreach loop

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $row_fruit .= "    <td>" . $row["name"] . "</td>\n";
    $row_color .= "    <td style='color:" . $row['color'] . ";'>" . $row["color"] . "</td>\n";
    $row_id .= "    <td>" . $row["id"] . "</td>\n";
}

// end html table rows (close tr)
echo $row_fruit . "  </tr>\n";
echo $row_color . "  </tr>\n";
echo $row_id . "  </tr>\n";

// closing horizontal table
echo "</table>\n";

pageBottom();