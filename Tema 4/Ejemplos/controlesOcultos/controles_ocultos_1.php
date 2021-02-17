<?php
// https://www.mclibre.org/consultar/php/lecciones/ejemplos/controles-ocultos-1.php

include_once "funciones.php";
$titulo = "Controles ocultos (Formulario 1). Controles ocultos. Ejemplos. PHP. Bartolomé Sintes Marco";
$estilo = "mclibre-php-ejercicios.css";
$tituloCSS = "Color";
$textoh1 = "Controles ocultos (Formulario 1)";

cabecera($titulo, $estilo, $tituloCSS, $textoh1);
?>

    <form action="controles_ocultos_2.php" method="get">
        <p>Escriba su nombre: <input type="text" name="nombre" id="sunombre" size="30" maxlength="20"/></p>

        <p class="der">
            <input type="submit" value="Enviar"/>
            <input type="reset" value="Borrar" name="Reset"/>
        </p>
    </form>

<?php
pie("2014-10-21");
?>
