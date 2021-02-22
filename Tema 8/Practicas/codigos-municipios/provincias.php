<?php

$json = file_get_contents('resources/provincias-aut.json');
$obj = json_decode($json, true);

    $comunidades = $obj;
    function getPronvincia($comunidades){

        $provincias = array_filter($comunidades, function ($var) {
            return ($var['aut'] == $_GET['id']);
        });

        return $provincias;
        
    }

    print_r(json_encode(
        getPronvincia($comunidades)
    ));
