<?php
/*
 * PHP Faker tutorial
 * http://zetcode.com/php/faker/
 *
 * Simple Faker example
 * The following example is a simple demonstration of Faker.
 *
 * IES Virgen del Carmen de Jaén
 * Desarrollo Web en Entorno Servidor 2º DAW
 * Rafael García Cabrera
 */
require_once __DIR__ . '/vendor/autoload.php';

$faker = Faker\Factory::create();

echo $faker->name . "\n";
echo $faker->address . "\n";
