<?php
/*
 * PHP Faker tutorial
 * http://zetcode.com/php/faker/
 *
 * Faking internet related data
 * Faker has several accessors for faking internet related data.
 *
 * IES Virgen del Carmen de Jaén
 * Desarrollo Web en Entorno Servidor 2º DAW
 * Rafael García Cabrera
 */
require_once __DIR__ . '/vendor/autoload.php';

$faker = Faker\Factory::create();

echo $faker->email . "\n";
echo $faker->safeEmail . "\n";
echo $faker->freeEmail . "\n";
echo $faker->companyEmail . "\n";
echo $faker->freeEmailDomain . "\n";
echo $faker->safeEmailDomain . "\n";
echo $faker->userName . "\n";
echo $faker->password . "\n";
echo $faker->domainName . "\n";
echo $faker->domainWord . "\n";
echo $faker->tld . "\n";
echo $faker->url . "\n";
echo $faker->slug . "\n";
echo $faker->ipv4 . "\n";
echo $faker->localIpv4 . "\n";
echo $faker->ipv6 . "\n";
echo $faker->macAddress . "\n";
