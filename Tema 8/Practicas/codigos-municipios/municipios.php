<?php

$json = file_get_contents('resources/municipios.json');
$obj = json_decode($json, true);

$municipios = $obj;
    function getMunicipios($municipios){

        $municipios = array_filter($municipios, function ($var) {
            return ($var['provincia_id'] == $_GET['id']);
        });

        return $municipios;
        
    }

    print_r(json_encode(
        getMunicipios($municipios)
    ));