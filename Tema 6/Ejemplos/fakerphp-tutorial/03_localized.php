<?php
/*
 * PHP Faker tutorial
 * http://zetcode.com/php/faker/
 *
 * Faking locale data
 * The Faker supports localized data to some extent. The locale is passed to the factory create() method.
 *
 * IES Virgen del Carmen de Jaén
 * Desarrollo Web en Entorno Servidor 2º DAW
 * Rafael García Cabrera
 */
require_once __DIR__ . '/vendor/autoload.php';

$faker = Faker\Factory::create('es_ES');

for ($i = 0; $i < 3; $i++) {

    $name = $faker->name;
    //$city = $faker->cityName;
    $phone = $faker->phoneNumber;

    //echo "$name, $city, $phone\n";
    echo "$name, $phone\n";
}

// Generates a Documento Nacional de Identidad (DNI) number
echo $faker->dni . "\n"; // '77446565E'

// Generates a random valid licence code
echo $faker->licenceCode . "\n"; // B

// Generates a Código de identificación Fiscal (CIF) number
echo $faker->vat . "\n"; // "A35864370"

// Generates a special rate toll free phone number
echo $faker->tollFreeNumber . "\n"; // 900 123 456

// Generates a mobile phone number
echo $faker->mobileNumber . "\n"; // +34 612 12 24
