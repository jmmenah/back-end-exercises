<?php
// https://www.mclibre.org/consultar/php/lecciones/ejemplos/controles-ocultos-1.php

include_once "funciones.php";
$titulo = "Controles ocultos. Ejemplos. PHP. Bartolomé Sintes Marco";
$estilo = "mclibre-php-ejercicios.css";
$tituloCSS = "Color";
$textoh1 = "Controles ocultos (POST)";

cabecera($titulo, $estilo, $tituloCSS, $textoh1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = recoge("nombre");
    print "    <p>Su nombre es <strong>$nombre</strong>.</p>\n";
    if (isset($_POST['apellido'])) {
        $apellido = recoge("apellido");
        print "    <p>Su apellido es <strong>$apellido</strong>.</p>\n";
    } else {
        ?>
        <form action="controles_ocultos.php" method="post">
        <p>Escriba su apellido: <input type="text" name="apellido" id="suapellido" size="30" maxlength="20"/></p>

        <p class="der">
            <input type="hidden" name="nombre" value="<?= $nombre ?>"/>
            <input type="submit" value="Enviar"/>
            <input type="reset" value="Borrar" name="Reset"/>
        </p>
    </form>
    <?php
    }
    print "    <p><a href='controles_ocultos.php'>Volver al formulario inicial.</a></p>\n";
} else {

    ?>

    <form action="controles_ocultos.php" method="post">
        <p>Escriba su nombre: <input type="text" name="nombre" id="sunombre" size="30" maxlength="20"/></p>

        <p class="der">
            <input type="submit" value="Enviar"/>
            <input type="reset" value="Borrar" name="Reset"/>
        </p>
    </form>

    <?php
}
pie("2014-10-21");
?>
