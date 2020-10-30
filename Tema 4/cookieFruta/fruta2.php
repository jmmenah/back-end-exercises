<?php
/**
 * DWES - 2º DAW - IES Virgen del Carmen de Jaén
 *
 * Ejercicio basado en: Cookies 1 - cookies_1b.php
 * https://www.mclibre.org/consultar/php/ejercicios/sesiones/cookies/cookies-1b.php
 *
 * @author    Bartolomé Sintes Marco <bartolome.sintes+mclibre@gmail.com>
 * @copyright 2010 Bartolomé Sintes Marco
 * @license   http://www.gnu.org/licenses/agpl.txt AGPL 3 or later
 * @version   2010-05-09
 * @link      http://www.mclibre.org
 */

// Para usar las funciones cabecera y pie 
include_once 'funciones.php';

$fruta = $_GET['fruta'] ?? '';

// Si se establece una fruta se crea la cookie frutaPreferida con el valor correspondiente $fruta
if (($fruta=='pera') || ($fruta=='manzana') || ($fruta=='fresa') || ($fruta=='limon') || ($fruta=='cerezas') || ($fruta=='naranja')) {
	setcookie('frutaPreferida', $fruta);
// Si no se elige fruta se comprueba si ya existe la cookie fruta y se guarda en $fruta
} elseif (isset($_COOKIE['frutaPreferida'])) {
	$fruta = $_COOKIE['frutaPreferida'];
} else {
	$fruta = '';
}

// Comprobar valor de la cookie frutaPreferida
// Si está definida la cookie frutaPreferida se guarda su valor en $fruta
// si no está definida la coookie frutaPreferida se guarda la cadena vacía en $fruta

$_COOKIE['frutaPreferida'] = $fruta;

// function cabecera($titulo, $estilo, $tituloCSS, $textoh1)
cabecera("Fruta Preferida Solucion","fruta.css",
	"Estilo básico", "Fruta Preferida Solucion");
		 
// Texto del mensaje según la fruta seleccionada
// $alt para el atributo alt y title de la imagen de cada bandera

switch ($fruta) {
	case '':
		$texto="No se ha elegido ningúna fruta.";
	break;
	case 'pera':
		$texto="Ha elegido pera.";
		$alt="pera";
	break;
	case 'manzana':
		$texto="Ha elegido manzana.";
		$alt="manzana";
	break;
	case 'fresa':
		$texto="Ha elegido fresa.";
		$alt="fresa";
	break;
	case 'limon':
		$texto="Ha elegido limon.";
		$alt="limon";
		break;
	case 'cerezas':
		$texto="Ha elegido cerezas.";
		$alt="cereza";
		break;
	case 'naranja':
		$texto="Ha elegido naranja.";
		$alt="naranja";
		break;
	default:
		$texto="Por defecto: pera.";
		$alt="pera";
		$fruta = 'pera';
}

print "<h2 id=\"mensaje\">$texto</h2>\n";

// Si hay algún idioma elegido se muestra la bandera
if ($fruta!='')
  print "<p class=\"fruta\"><img src=\"images/".$fruta.".svg\" alt=\"".$alt."\" title=\"".$alt."\" /></p>\n";

print "<p><a href='fruta1.php'>Volver a la selección de fruta</a></p>\n";

// function pie($fecha)
pie("2020-10-30");
?>
