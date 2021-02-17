<?php
/**
 * ZODIAC SIGNS - mostrar_tabla_zodiacsigns.php
 *
 * IES Virgen del Carmen de Jaén
 * Desarrollo Web en Entorno Servidor 2º DAW
 *
 * Based on the code of:
 *
 * @author    Bartolomé Sintes Marco <bartolome.sintes+mclibre@gmail.com>
 * @copyright 2012 Bartolomé Sintes Marco
 * @license   http://www.gnu.org/licenses/agpl.txt AGPL 3 or later
 * @version   2012-11-27
 * @link      http://www.mclibre.org
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
session_name("zodiac");
session_start();

if ( ! isset($_SESSION['user']) ) {
    die('Not logged in');
} else {
    $name = $_SESSION['user'];
}

require_once "zodiac_functions.php";

pageTop("Display zodiacsigns table", BACK_MENU);

try {
    $user = "epiz_26867015";
    $pass = "tJXLcWxY2Fmw";
    $dbname = "epiz_26867015_zodiac";
    $db = new PDO("mysql:host=sql202.epizy.com; dbname=$dbname", $user, $pass);
    echo "<p>You have connected to the database: <strong>$dbname</strong>.</p>\n";

    if (!displayTables($db)) {
        echo "<p>Problems displaying <strong>zodiacsings</strong> table in database: <strong>$dbname</strong></p>\n";
    }

    $db = null;  // close connection
    print "<p>... and the connection is closed<p>";
} catch (PDOException $e) {
    print "<p>Error: COULD NOT CONNECT TO THE MySQL SERVER.</p>\n";
    print "<p>Error: " . $e->getMessage() . "</p>\n";
    exit();
}

function displayTables($connection)
{

    global $dbname;
    define("LINE", "\n<br>");

    $zodiacsOK = true;

    $query = "SELECT `id`, `sign`, `symbol`, `planet`, `element`, `start_month`, `start_day`, `end_month`, `end_day` FROM `zodiacsigns`;";

    if ($connection->query($query)) {
        echo "<table>
    <tr>
        <th>id</th>
        <th>sign</th>
        <th>symbol</th>
        <th>planet</th>
        <th>element</th>
        <th>start month</th>
        <th>start day</th>
        <th>end month</th>
        <th>end day</th>
    </tr>";
        foreach ($connection->query($query) as $row) {
            $id = $row['id'];
            $sing = $row['sign'];
            $symbol = $row['symbol'];
            $planet = $row['planet'];
            $element = $row['element'];
            $start_month = $row['start_month'];
            $start_day = $row['start_day'];
            $end_month = $row['end_month'];
            $end_day = $row['end_day'];

            echo "<tr>
                <td>$id</td>
                <td>$sing</td>
                <td>$symbol</td>
                <td>$planet</td>
                <td>$element</td>
                <td>$start_month</td>
                <td>$start_day</td>
                <td>$end_month</td>
                <td>$end_day</td>
         </tr>";
        }
        echo "</table>";
    } else {
        echo "<p> The <strong>zodiacsings</strong> table could not be displayed in database <strong>$dbname</strong></p>\n";
        $zodiacsOK = false;
    }

    return $zodiacsOK;
}

pageBottom("2020-11-20");
