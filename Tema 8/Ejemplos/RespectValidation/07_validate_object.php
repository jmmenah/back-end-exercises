<?php
// PHP Respect Validation tutorial
// http://zetcode.com/php/respectvalidation/

// See user.php

// https://respect-validation.readthedocs.io/en/latest/rules/Alnum/
// https://respect-validation.readthedocs.io/en/latest/rules/Length/

// https://respect-validation.readthedocs.io/en/latest/rules/Attribute/

// https://respect-validation.readthedocs.io/en/latest/rules/Email/

require('vendor/autoload.php');
require_once('user.php');

use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\NestedValidationException;

$user = new User();
$user->setName('Jo');
$user->setEmail('johndoe#gmail.com');

$userValidator = v::attribute('name', v::alnum()->length(4, null))
    ->attribute('email', v::email());

try {
    $userValidator->assert($user);
} catch (NestedValidationException $ex) {

    $messages = $ex->getMessages();

    foreach ($messages as $message) {
        echo $message . "<br>\n";
    }
}
