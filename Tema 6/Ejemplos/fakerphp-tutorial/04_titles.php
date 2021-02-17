<?php
/*
 * PHP Faker tutorial
 * http://zetcode.com/php/faker/
 *
 * Faking titles
 * The following example creates fake data for titles. Faker generates academic and personal titles.
 *
 * IES Virgen del Carmen de Jaén
 * Desarrollo Web en Entorno Servidor 2º DAW
 * Rafael García Cabrera
 */
require_once __DIR__ . '/vendor/autoload.php';

$faker = Faker\Factory::create();

echo $faker->title() . "\n";
echo $faker->title('male') . "\n";
echo $faker->title('female') . "\n";

echo $faker->titleMale . "\n";
echo $faker->titleFemale . "\n";
echo $faker->suffix . "\n";

$faker = Faker\Factory::create('es_ES');

echo $faker->title() . "\n";
echo $faker->title('male') . "\n";
echo $faker->title('female') . "\n";

echo $faker->titleMale . "\n";
echo $faker->titleFemale . "\n";
echo $faker->suffix . "\n"; 
