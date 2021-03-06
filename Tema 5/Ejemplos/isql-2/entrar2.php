<?php
/**
 * Inyección SQL 2 - entrar2.php
 *
 * @author    Bartolomé Sintes Marco <bartolome.sintes+mclibre@gmail.com>
 * @copyright 2012 Bartolomé Sintes Marco
 * @license   http://www.gnu.org/licenses/agpl.txt AGPL 3 or later
 * @version   2012-11-25
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

include("biblioteca.php");

$db = conectaDb();
cabecera("Entrar 2", MENU_VOLVER, CABECERA_SIN_CURSOR);

// Esta página no desinfecta la entrada del usuario
// por lo que puede sufrir inyecciones SQL
// Utiliza la biblioteca PDO

// Esta función permite los ataques de inyección SQL que inyectan varias
// consultas en una. Normalmente pdo no ejecuta más que la primera consulta
function pdo_query_multi($db, $query) {
    $pattern = '/^(.*;)(.*;)/s';
	
    if (preg_match($pattern,$query,$match)) {
        $result = $db->query($match[1]);
        // Hacemos fetchAll() porque si no la segunda consulta da error
        // $db->errorInfo() dice que es error HY000 (database table is locked)
        if ($result) {
            $result->fetchAll();
        }
        $result2 = $db->query($match[2]);
        // Hacemos fetchAll() y repetimos la primera consulta
        // que es la que espera el programa y con el fetchAll() anterior
        // hemos perdido el resultado
        if ($result2) {
            $result2->fetchAll();
        }
        $result = $db->query($match[1]);
    } else {
        $result = $db->query($query);
    } 
	
	//var_dump($match);
    return (@$result);
}

$usuario    = $_REQUEST["usuario"];
$contraseña = $_REQUEST["contraseña"];

// Añadido para ver los datos recogidos
echo "<p>USUARIO: <span style='color:green;'>".$usuario."</span></p>";
echo "<p>CONTRASEÑA: <span style='color:red;'>".$contraseña."</span></p>";

if ($usuario == "" || $contraseña == "") {
    print "<p>Hay que rellenar los dos campos.</p>\n";
} else {
    $consulta = "SELECT COUNT(*) FROM $dbTabla
        WHERE user='$usuario'
        AND password='$contraseña'";
	// Añadido para ver la consulta recibida	
	echo "<p>CONSULTA: <span style='color:blue;'>".$consulta."</span></p>";
	
    $result = pdo_query_multi($db, $consulta);
	
    if (!$result) {
        print "<p>Error en la consulta.</p>\n";
    } else {
        if ($result->fetchColumn() > 0) {
            print "<p>Nombre de usuario y contraseña correctos.</p>\n";
        } else {
            $consulta = "SELECT COUNT(*) FROM $dbTabla
                WHERE user='$usuario'"; 			
			// Añadido para que funcionen las inyecciones
            // PDOStatement::closeCursor  Cierra un cursor, 
			//  habilitando a la sentencia para que sea ejecutada otra vez 
			// http://www.php.net/manual/es/pdostatement.closecursor.php
			$result->closeCursor();
            $result = pdo_query_multi($db, $consulta);
            if (!$result) {
                print "<p>Error en la consulta.</p>\n";
            } elseif ($result->fetchColumn() > 0) {
                print "<p>Contraseña incorrecta.</p>\n";
            } else {
                print "<p>Nombre de usuario incorrecto.</p>\n";
            }
        }
    }
}

$db = NULL;
pie();
?>
