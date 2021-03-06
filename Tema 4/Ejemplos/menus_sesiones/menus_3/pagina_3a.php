<?php
/**
 * Menús 3 - pagina_3a.php
 *
 * @author    Bartolomé Sintes Marco <bartolome.sintes+mclibre@gmail.com>
 * @copyright 2016 Bartolomé Sintes Marco
 * @license   http://www.gnu.org/licenses/agpl.txt AGPL 3 or later
 * @version   2016-11-21
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

require_once "biblioteca.php";

cabecera("Tercera página - Confirmación previa", MENU_SECUNDARIO);

print "      <form action=\"pagina_3b.php\" method=\"" . FORM_METHOD . "\">\n";
print "        <p>¿Está seguro de querer ir a la tercera página?</p>\n";
print "\n";
print "        <p>\n";
print "          <input type=\"submit\" value=\"Sí\" name=\"si\" />\n";
print "          <input type=\"submit\" value=\"No\" name=\"no\" />\n";
print "        </p>\n";
print "      </form>\n";

pie();
