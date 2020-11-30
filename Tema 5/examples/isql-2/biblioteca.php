<?php
/**
 * Inyección SQL 2 - biblioteca.php
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
 
/* 14 febrero 2013
   ¡OjO! he modificado unas líneas (comentadas) para facilitar inyección en MySQL  
         y solamente se necesite el nombre de la tabla y no el de la BBDD.
   Además de este fichero se ha modificado borrartodo2.php para crear la tabla 
		 
   En entrar2.php se han añadido echo con colores para usuario, contraseña y consulta

   30 enero 2017
   Se codifican los ficheros con UTF-8
   Se modifica función cabecera para HTML5
*/
 
define("CABECERA_CON_CURSOR", TRUE);   // Para función cabecera()
define("CABECERA_SIN_CURSOR", FALSE);  // Para función cabecera()
define("FORM_METHOD",         "get");  // Formularios se envían con GET
//define("FORM_METHOD",         "post"); // Formularios se envían con POST
define("MENU_PRINCIPAL",      "menuPrincipal"); // Menú principal
define("MENU_VOLVER",         "menuVolver");    // Menú Volver a inicio
define("MYSQL",               "MySQL");
define("SQLITE",              "SQLite");
define("MAX_REG_TABLA",       20);  // Número máximo de registros en la tabla
$tamUsuario    = 80; // Tamaño del campo Usuario
$tamContraseña = 80; // Tamaño del campo Contraseña
$recorta = array(
    "user"     => $tamUsuario,
    "password" => $tamContraseña);

$dbMotor = MYSQL;                        // Base de datos empleada
if ($dbMotor == MYSQL) {
    define("MYSQL_HOST", "mysql:host=localhost"); // Nombre de host MYSQL
    define("MYSQL_USUARIO", "root");       // Nombre de usuario de MySQL
    define("MYSQL_PASSWORD", "");          // Contraseña de usuario de MySQL
    $dbDb    = "mclibre_inyeccion_sql_2";  // Nombre de la base de datos
	//Se comenta esta línea original para facilitar inyección s
	//solamente habrá que adivinar nombre de la tabla y no el nombre de la BBDD
    //$dbTabla = $dbDb.".tabla";             // Nombre de la tabla
	$dbTabla = "tabla";  
} elseif ($dbMotor == SQLITE) {
    $dbDb    = "/tmp/mclibre/mclibre_inyeccion_sql_2.sqlite";  // Nombre de la base de datos
    $dbTabla = "tabla";                   // Nombre de la tabla
}

function conectaDb()
{
    global $dbMotor, $dbDb;

    try {
        if ($dbMotor == MYSQL) {
            $db = new PDO(MYSQL_HOST, MYSQL_USUARIO, MYSQL_PASSWORD);
            $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, TRUE);
			// Añadido seleccionar BBDD para facilitar inyección
			$db->query("use mclibre_inyeccion_sql_2");
        } elseif ($dbMotor == SQLITE) {
            $db = new PDO("sqlite:".$dbDb);
        }
        return($db);
    } catch (PDOException $e) {
        cabecera("Error grave", MENU_PRINCIPAL, CABECERA_SIN_CURSOR);
        print "<p>Error: No puede conectarse con la base de datos.</p>\n";
        print "<p>Error: " . $e->getMessage() . "</p>\n";
        pie();
        exit();
    }
}

function recorta($campo, $cadena)
{
    global $recorta;

    $tmp = isset($recorta[$campo])
    ? substr($cadena, 0, $recorta[$campo])
    : $cadena;
    return $tmp;
}

function recoge($var, $var2="")
{
    $tmp = (isset($_REQUEST[$var]) && trim(strip_tags($_REQUEST[$var])) != "")
    ? strip_tags(trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "ISO-8859-1")))
    : strip_tags(trim(htmlspecialchars($var2, ENT_QUOTES, "ISO-8859-1")));
    if (get_magic_quotes_gpc()) {
        $tmp = stripslashes($tmp);
    }
    $tmp = recorta($var, $tmp);
    return $tmp;
}

function recogeMatriz($var)
{
    $tmpMatriz = array();
    if (isset($_REQUEST[$var]) && is_array($_REQUEST[$var])) {
        foreach ($_REQUEST[$var] as $indice => $valor) {
            $tmp = strip_tags(trim(htmlspecialchars($indice, ENT_QUOTES, "ISO-8859-1")));
            if (get_magic_quotes_gpc()) {
                $tmp = stripslashes($tmp);
            }
            $tmp = recorta($var, $tmp);
            $indiceLimpio = $tmp;

            $tmp = strip_tags(trim(htmlspecialchars($valor, ENT_QUOTES, "ISO-8859-1")));
            if (get_magic_quotes_gpc()) {
                $tmp = stripslashes($tmp);
            }
            $tmp = recorta($var, $tmp);
            $valorLimpio = $tmp;

            $tmpMatriz[$indiceLimpio] = $valorLimpio;
        }
    }
    return $tmpMatriz;
}

function cabecera($texto, $menu, $conCursor)
{
    print "<!DOCTYPE html>
<html lang='es'>
<head>
  <meta charset='utf-8' />
  <title>www.mclibre.org - Inyección SQL 2 - $texto</title>
  <meta name='viewport' content='width=device-width, initial-scale=1.0' />
  <link href=\"mclibre_php_soluciones_proyectos_comun.css\" rel=\"stylesheet\" type=\"text/css\" />
</head>\n\n";
    if ($conCursor) {
        print "<body onload=\"document.getElementById('cursor').focus()\">\n";
    } else {
        print "<body>\n";
    }
    print "<h1>Inyección SQL 2 - $texto</h1>
<div id=\"menu\">
  <ul>\n";
    if ($menu == MENU_PRINCIPAL) {
        print "    <li><a href=\"entrar1.php\">Entrar en el sistema</a></li>
    <li><a href=\"insertar1.php\">Añadir usuarios</a></li>
    <li><a href=\"borrartodo1.php\">Borrar todo</a></li>\n";
    } elseif ($menu == MENU_VOLVER) {
        print "    <li><a href=\"index.php\">Página inicial</a></li>\n";
    } else {
        print "    <li>Error en la selección de menú</li>\n";
    }
    print "  </ul>
</div>

<div id=\"contenido\">\n";
}

function pie()
{
    print '</div>

<div id="pie">
<address>
  Este programa forma parte del curso "Páginas web con PHP" disponible en <a
  href="http://www.mclibre.org/">http://www.mclibre.org</a><br />
  Autor: Bartolomé Sintes Marco<br />
  Última modificación de este programa: 25 de noviembre de 2012
</address>
<p class="licencia">El programa PHP que genera esta página está bajo
<a rel="license" href="http://www.gnu.org/licenses/agpl.txt">licencia AGPL 3 o
posterior</a>.</p>
</div>
</body>
</html>';
}
