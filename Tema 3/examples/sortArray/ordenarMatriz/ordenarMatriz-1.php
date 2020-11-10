<?php
// https://www.mclibre.org/consultar/php/ejercicios/con-formularios/matrices-1/matrices-1-3-1.php

include_once "funciones.php";
$titulo = " Ordenar matriz (Formulario). Matrices (1). Con formularios. Ejercicios. PHP. Bartolomé Sintes Marco. www.mclibre.org";
$estilo = "mclibre-php-ejercicios.css";
$tituloCSS = "Color";
$textoh1 = "Ordenar matriz (Formulario)";

cabecera($titulo, $estilo, $tituloCSS, $textoh1);
?>
    <form action="ordenarMatriz-2.php" method="get">
        <p>Indique el rango del número de valores y el rango de los valores y
            mostraré un numero aleatorio de valores aleatorios en los rangos indicados.</p>

        <p>Indique si quiere los valores ordenados en orden directo o inverso.</p>

        <table>
            <tbody>
            <tr>
                <td><label for="numeroMinimo">Número mínimo de valores:</label></td>
                <td><input type="number" name="numeroMinimo" min="1" value="10" id="numeroMinimo"></td>
            </tr>
            <tr>
                <td><label for="numeroMaximo">Número máximo de valores:</label></td>
                <td><input type="number" name="numeroMaximo" min="1" value="20" id="numeroMaximo"></td>
            </tr>
            <tr>
                <td><label for="valorMinimo">Valor mínimo:</label></td>
                <td><input type="number" name="valorMinimo" min="0" value="0" id="valorMinimo"></td>
            </tr>
            <tr>
                <td><label for="valorMaximo">Valor máximo:</label></td>
                <td><input type="number" name="valorMaximo" min="0" value="100" id="valorMaximo"></td>
            </tr>
            <tr>
                <td>Ordenar por orden ...:</td>
                <td>
                    <label><input type="radio" name="orden" value="directo"> Directo</label>
                    <label><input type="radio" name="orden" value="inverso"> Inverso</label>
                </td>
            </tr>
            </tbody>
        </table>

        <p>
            <input type="submit" value="Mostrar">
            <input type="reset" value="Borrar">
        </p>
    </form>

<?php

pie("2019-10-24");
/**
 * Matrices (1) 3-2 - matrices-1-3-1.php
 *
 * @author    Bartolomé Sintes Marco <bartolome.sintes+mclibre@gmail.com>
 * @copyright 2019 Bartolomé Sintes Marco
 * @license   http://www.gnu.org/licenses/agpl.txt AGPL 3 or later
 * @version   2019-10-24
 * @link      https://www.mclibre.org
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
?>