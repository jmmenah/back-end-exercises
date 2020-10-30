<?php 
/**
 * DWES - 2º DAW - IES Virgen del Carmen de Jaén
 *
 * Ejercicio basado en: Cookies 1 - cookies_1a.php
 * https://www.mclibre.org/consultar/php/ejercicios/sesiones/cookies/cookies-1a.php
 *
 * @author    Bartolomé Sintes Marco <bartolome.sintes+mclibre@gmail.com>
 * @copyright 2010 Bartolomé Sintes Marco
 * @license   http://www.gnu.org/licenses/agpl.txt AGPL 3 or later
 * @version   2010-05-09
 * @link      http://www.mclibre.org
 */

// Para usar las funciones cabecera y pie
include_once 'funciones.php';

// function cabecera($titulo, $estilo, $tituloCSS, $textoh1)
cabecera("Fruta Preferida", "fruta.css",
    "Estilo básico", "Fruta Preferida");

//Elegir fruta
print "<p>Indique fruta preferida: 
  <form method='get' action='fruta2.php'>
  <input type='radio' name='fruta' value='pera' id='pera'><label for='pera'>Pera</label><br>
  <input type='radio' name='fruta' value='manzana' id='manzana'><label for='manzana'>Manzana</label><br>
  <input type='radio' name='fruta' value='fresa' id='fresa'><label for='fresa'>Fresa</label><br>
  <input type='radio' name='fruta' value='limon' id='limon'><label for='limon'>Limon</label><br>
  <input type='radio' name='fruta' value='cerezas' id='cerezas'><label for='cerezas'>Cerezas</label><br>
  <input type='radio' name='fruta' value='naranja' id='naranja'><label for='naranja'>Naranja</label><br><br>
  <input type='submit' value='Enviar'>
  <input type='reset' value='Borrar'>
</form>";

// function pie($fecha)
pie("2020-10-30");
?>
