<?php
/*
 * PHP Faker tutorial
 * http://zetcode.com/php/faker/
 *
 * Faking colours
 * Faker can create colour names or different colour formats, such as hexadecimal and RGB.
 *
 * IES Virgen del Carmen de Jaén
 * Desarrollo Web en Entorno Servidor 2º DAW
 * Rafael García Cabrera
 */
require_once __DIR__ . '/vendor/autoload.php';

$faker = Faker\Factory::create();

echo $faker->hexcolor . "\n";
echo $faker->rgbcolor . "\n";
dump($faker->rgbColorAsArray);
echo $faker->rgbCssColor . "\n";
echo $faker->safeColorName . "\n";
echo $faker->colorName . "\n";
