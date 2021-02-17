<?php
// PHP Respect Validation tutorial
// http://zetcode.com/php/respectvalidation/

// https://respect-validation.readthedocs.io/en/latest/rules/Alnum/
// https://respect-validation.readthedocs.io/en/latest/rules/NotEmpty/

require('vendor/autoload.php');

use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\NestedValidationException;

$name = "";

$validator = v::alnum()->notEmpty();

try {
    $validator->assert($name);
} catch (NestedValidationException $ex) {

    $messages = $ex->getMessages();

    foreach ($messages as $message) {
        echo $message . "<br>\n";
    }
}

