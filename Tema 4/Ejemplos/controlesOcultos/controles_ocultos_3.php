<?php
// https://www.mclibre.org/consultar/php/lecciones/ejemplos/controles-ocultos-3.php

include_once "funciones.php";
$titulo = "Controles ocultos (Resultado). Controles ocultos. Ejemplos. PHP. Bartolomé Sintes Marco";
$estilo = "mclibre-php-ejercicios.css";
$tituloCSS = "Color";
$textoh1 = "Controles ocultos (Resultado)";

cabecera($titulo, $estilo, $tituloCSS, $textoh1);

$nombre = recoge("nombre");
$apellido = recoge("apellido");

print "    <p>Su nombre es <strong>$nombre</strong>.</p>\n";
print "    <p>Su apellido es <strong>$apellido</strong>.</p>\n";
?>

    <p><a href="controles_ocultos_1.php">Volver al formulario inicial.</a></p>

<?php
pie("2014-10-21");
?>
