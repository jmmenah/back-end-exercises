<?php
// https://www.mclibre.org/consultar/php/ejercicios/con-formularios/matrices-1/matrices-1-3-1.php

include_once "funciones.php";
$titulo = " Ordenar matriz (Resultado). Matrices (1). Con formularios. Ejercicios. PHP. Bartolomé Sintes Marco. www.mclibre.org";
$estilo = "mclibre-php-ejercicios.css";
$tituloCSS = "Color";
$textoh1 = "Ordenar matriz (Resultado)";

cabecera($titulo, $estilo, $tituloCSS, $textoh1);

$numeroMinimo = recoge("numeroMinimo");
$numeroMaximo = recoge("numeroMaximo");
$valorMinimo = recoge("valorMinimo");
$valorMaximo = recoge("valorMaximo");
$orden = recoge("orden");

$valoresOk = false;

if ($numeroMinimo == "" || $numeroMaximo == "" || $valorMinimo == "" || $valorMaximo == "") {
    print "  <p class=\"aviso\">No ha escrito alguno(s) de los valores.</p>\n";
    print "\n";
} elseif (!is_numeric($numeroMinimo) || !is_numeric($numeroMaximo) || !is_numeric($valorMinimo) || !is_numeric($valorMaximo)) {
    print "  <p class=\"aviso\">No ha escrito alguno(s) de los valores como número.</p>\n";
    print "\n";
} elseif (!ctype_digit($numeroMinimo) || !ctype_digit($numeroMaximo) || !ctype_digit($valorMinimo) || !ctype_digit($valorMaximo)) {
    print "  <p class=\"aviso\">No ha escrito alguno(s) de los valores  como número entero.</p>\n";
    print "\n";
} elseif ($numeroMinimo < 1 || $numeroMaximo < 1 || $valorMinimo < 0 || $valorMaximo < 0) {
    print "  <p class=\"aviso\">Alguno de los valores no está en el rango previsto.</p>\n";
    print "\n";
} elseif ($orden != "" && $orden != "directo" && $orden != "inverso") {
    print "  <p class=\"aviso\">El orden indicado no es correcto.</p>\n";
    print "\n";
} else {
    $valoresOk = true;
}

if ($valoresOk) {
    $numeroValores = rand($numeroMinimo, $numeroMaximo);

    print "  <h2>Datos iniciales</h2>\n";
    print "\n";
    print "  <p>Número de valores en la matriz: $numeroValores</p>\n";
    print "\n";
    print "  <p>Valores elegidos al azar entre $valorMinimo y $valorMaximo</p>\n";
    print "\n";

    // Crea la matriz inicial
    $matriz = [];
    for ($i = 0; $i < $numeroValores; $i++) {
        $matriz[] = rand($valorMinimo, $valorMaximo);
    }

    print "  <h2>Matriz inicial de valores</h2>\n";
    print "\n";
    print "  <pre>\n";
    print_r($matriz);
    print "</pre>\n";
    print "\n";

    // Ordena la matriz inicial
    if ($orden == "directo") {
        asort($matriz);
        print "  <h2>Matriz ordenada de valores (orden directo)</h2>\n";
        print "\n";
        print "  <pre>\n";
        print_r($matriz);
        print "</pre>\n";
        print "\n";
    } elseif ($orden == "inverso") {
        arsort($matriz);
        print "  <h2>Matriz ordenada de valores (orden inverso)</h2>\n";
        print "\n";
        print "  <pre>\n";
        print_r($matriz);
        print "</pre>\n";
        print "\n";
    } else {
        print "  <h2>Matriz ordenada de valores</h2>\n";
        print "\n";
        print "  <p>No se ha solicitado ordenar la matriz</p>\n";
        print "\n";
    }
}
?>
    <p><a href="ordenarMatriz-1.php">Volver al formulario.</a></p>

<?php
pie("2019-10-24");

/**
 * Matrices (1) 3-2 - matrices-1-3-2.php
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