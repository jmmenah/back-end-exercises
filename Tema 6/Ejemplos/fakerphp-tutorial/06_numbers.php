<?php
/*
 * PHP Faker tutorial
 * http://zetcode.com/php/faker/
 *
 * Faking numbers
 * The Faker allows to generate random digits, integers, or floating point values.
 *
 * IES Virgen del Carmen de Jaén
 * Desarrollo Web en Entorno Servidor 2º DAW
 * Rafael García Cabrera
 */
require_once __DIR__ . '/vendor/autoload.php';

$faker = Faker\Factory::create();

echo $faker->randomDigit . "\n";
echo $faker->randomDigitNotNull . "\n";

echo $faker->randomNumber() . "\n";
echo $faker->randomNumber($nbDigits = 3, $strict = true) . "\n";

echo $faker->randomFloat() . "\n";
echo $faker->randomFloat($nbMaxDecimals = 5, $min = 0, $max = 20) . "\n";
echo $faker->numberBetween($min = 1500, $max = 6000) . "\n";

dump($faker->shuffle([1, 2, 3, 4, 5, 6]));
