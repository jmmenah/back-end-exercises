<?php
// Funciones para ordenarMatriz-1.php
//                ordenarMatriz-2.php
/*
   $titulo de la página etiqueta <title> en <head>
   $estilo nombre de la hoja de estilo, fichero css
   $tituloCSS nombre del estilo css
   $textoh1 texto a incluir dentro de la etiqueta <h1> al comienzo de la página
*/
function cabecera($titulo, $estilo, $tituloCSS, $textoh1)
{
    print "<!DOCTYPE html>
<html lang='es'>
  <head>
    <meta charset='utf-8' />
    <title>$titulo</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <link href='$estilo' rel='stylesheet' type='text/css' title='$tituloCSS' />
  </head>
  <body>
    <h1>$textoh1</h1>\n";
}

/*
   $fecha de última modificación de la página que realiza la llamada
   aaaa-mm-dd
*/
function pie($fecha)
{
    $cadenaFecha = formatearFecha($fecha);
    echo <<< FINPIE
    <footer>
      <p class="ultmod">
        Última modificación de esta página:
        <time datetime="$fecha">$cadenaFecha</time></p>

      <p class="licencia">
        Este programa forma parte del curso <strong><a href="http://www.mclibre.org/consultar/php/">
        Programación web en PHP</a></strong> por <a href="http://www.mclibre.org/" rel="author">Bartolomé
        Sintes Marco</a>.<br />
        El programa PHP que genera esta página se distribuye bajo
        <a rel="license" href="http://www.gnu.org/licenses/agpl.txt">licencia AGPL 3 o posterior</a>.</p>
    </footer>
  </body>
</html>
FINPIE;
}


/*
   $fecha en formato "aaaa-mm-dd" se pasa a "dd de mes de aaaa"

   Configuración de idioma, para que el mes salga en español
   http://php.net/manual/es/function.setlocale.php

   strftime — Formatea una fecha/hora local según una configuración local
   http://php.net/manual/es/function.strftime.php

   strtotime — Convierte una descripción de fecha/hora textual en Inglés a una fecha Unix
   http://php.net/manual/es/function.strtotime.php
*/

function formatearFecha($fecha)
{
    define('formatoFecha', '%d de %B de %Y');
    setlocale(LC_ALL, 'es_ES.UTF-8');
    return strftime(formatoFecha, strtotime($fecha));
}

// FUNCIÓN DE RECOGIDA DE DATOS
// https://www.mclibre.org/consultar/php/lecciones/php-recogida-datos.html
function recoge($var, $m = "")
{
    if (!isset($_REQUEST[$var])) {
        $tmp = (is_array($m)) ? [] : "";
    } elseif (!is_array($_REQUEST[$var])) {
        $tmp = trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"));
    } else {
        $tmp = $_REQUEST[$var];
        array_walk_recursive($tmp, function (&$valor) {
            $valor = trim(htmlspecialchars($valor, ENT_QUOTES, "UTF-8"));
        });
    }
    return $tmp;
}

