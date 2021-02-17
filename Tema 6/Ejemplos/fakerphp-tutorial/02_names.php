<?php
/*
 * PHP Faker tutorial
 * http://zetcode.com/php/faker/
 *
 * Faking names
 * In the second example, we fake data related to user names.
 *
 * IES Virgen del Carmen de Jaén
 * Desarrollo Web en Entorno Servidor 2º DAW
 * Rafael García Cabrera
 */
require_once __DIR__ . '/vendor/autoload.php';

$faker = Faker\Factory::create();

echo $faker->name() . "\n";
echo $faker->name('male') . "\n";
echo $faker->name('female') . "\n";

echo $faker->firstName() . "\n";
echo $faker->firstName($gender = 'male') . "\n";
echo $faker->firstName($gender = 'female') . "\n";

echo $faker->firstNameMale('female') . "\n";
echo $faker->firstNameFemale('female') . "\n";

echo $faker->lastName() . "\n";
