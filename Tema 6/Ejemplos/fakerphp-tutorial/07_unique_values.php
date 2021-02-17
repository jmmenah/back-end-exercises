<?php
/*
 * PHP Faker tutorial
 * http://zetcode.com/php/faker/
 *
 * Faking unique values
 * With unique() modifier, we can produce unique fake values.
 *
 * IES Virgen del Carmen de Jaén
 * Desarrollo Web en Entorno Servidor 2º DAW
 * Rafael García Cabrera
 */
require_once __DIR__ . '/vendor/autoload.php';

$faker = Faker\Factory::create();

$vals = [];

for ($i = 0; $i < 6; $i++) {
    
  $vals[] = $faker->unique()->randomDigit;
}

dump($vals); 
