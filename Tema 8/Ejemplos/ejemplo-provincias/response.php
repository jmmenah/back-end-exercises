<?php
// https://programarivm.com/lista-dinamica-de-provincias-y-regiones-con-ajax-json-y-jquery/

    $comunidades = array(
        array('Almería', 'Cádiz', 'Córdoba', 'Granada', 'Jaén', 'Málaga', 'Huelva', 'Sevilla'),
        array('Huesca', 'Teruel', 'Zaragoza'),
        array('Barcelona', 'Girona', 'Lleida', 'Tarragona')
    );
    print_r(json_encode(array('provincias' => $comunidades[$_GET['id']])));
