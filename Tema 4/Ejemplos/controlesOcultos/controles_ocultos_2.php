<?php
// https://www.mclibre.org/consultar/php/lecciones/ejemplos/controles-ocultos-2.php

include_once "funciones.php";
$titulo = "Controles ocultos (Formulario 2). Controles ocultos. Ejemplos. PHP. Bartolomé Sintes Marco";
$estilo = "mclibre-php-ejercicios.css";
$tituloCSS = "Color";
$textoh1 = "Controles ocultos (Formulario 2)";

cabecera($titulo, $estilo, $tituloCSS, $textoh1);

$nombre = recoge("nombre");

print "    <p>Su nombre es <strong>$nombre</strong>.</p>\n";
?>

    <form action="controles_ocultos_3.php" method="get">
        <p>Escriba su apellido: <input type="text" name="apellido" id="suapellido" size="30" maxlength="20"/></p>

        <p class="der">
            <input type="hidden" name="nombre" value="<?= $nombre ?>"/>
            <input type="submit" value="Enviar"/>
            <input type="reset" value="Borrar" name="Reset"/>
        </p>
    </form>

    <p><a href="controles_ocultos_1.php">Volver al formulario anterior.</a></p>

<?php
pie("2014-10-21");
?>
