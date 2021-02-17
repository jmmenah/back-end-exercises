<?php
/**
 * ZODIAC SIGNS - create_zodiac_db.php
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

pageTop("Create zodiac DB", BACK_MENU);

try {
    $db = new PDO("mysql:host=sql202.epizy.com", "epiz_26867015", "tJXLcWxY2Fmw");
    echo "<p>YOU HAVE CONNECTED TO THE MySQL SERVER.</p>\n";
    $dbname = "epiz_26867015_zodiac";  // database name
    $query = "CREATE DATABASE $dbname;";

    if ($db->query($query)) {
        echo "<p>Database created: <strong>$dbname</strong></p>\n";
    } else {
        echo "<p>The database could not be created: <strong>$dbname</strong> </p>\n";
    }
    $db = null;
    print "<p>... and the connection is closed</p>";
} catch (PDOException $e) {
    print "<p>Error: COULD NOT CONNECT TO THE MySQL SERVER.</p>\n";
    print "<p>Error: " . $e->getMessage() . "</p>\n";
    exit();
}

pageBottom("2020-11-20");

