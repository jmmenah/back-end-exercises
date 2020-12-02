<?php
/**
 * ZODIAC SIGNS - zodiac.php
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


if ( isset($_POST['logout']) ) {
    header('Location: index.php');
    return;
}

require_once "zodiac_functions.php";

pageTop("Home", MAIN_MENU);

if (isset($_SESSION['success'])) {
    echo('<h2 style="color: green;">' . htmlentities($_SESSION['success']) .'Your user is '.htmlentities($_SESSION['user']). "</h2>\n");
    unset($_SESSION['success']);
}

pageBottom("2020-11-20");

