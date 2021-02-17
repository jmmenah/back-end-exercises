<?php
/*
 * PHP Faker tutorial
 * http://zetcode.com/php/faker/
 *
 */
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/User.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Faker\Factory;

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);

$faker = Factory::create();

$users = [];

for ($i = 0; $i < 20; $i++) 
{
    $firstName = $faker->firstName;
    $lastName = $faker->lastName;
    $occupation = $faker->jobTitle;

    $user = new User($firstName, $lastName, $occupation);
    array_push($users, $user);
}

$content = $twig->render('users.xml.twig', ['users' => $users]);
file_put_contents('users.xml', $content);
