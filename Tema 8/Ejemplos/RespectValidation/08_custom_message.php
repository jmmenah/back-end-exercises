<?php
// PHP Respect Validation tutorial
// http://zetcode.com/php/respectvalidation/


// https://respect-validation.readthedocs.io/en/latest/rules/Alnum/
// https://respect-validation.readthedocs.io/en/latest/rules/NotEmpty/

require('vendor/autoload.php');

use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\NestedValidationException;

$name = "";

//$validator = v::alnum()->notEmpty()->setName('name');
$validator = v::alnum()->notEmpty();

try {
    $validator->assert($name);
} catch (NestedValidationException $ex) {

    // Pay attention to the version change
    // https://respect-validation.readthedocs.io/en/1.1/feature-guide/#custom-messages
    //$errors = $ex->findMessages([

    // https://respect-validation.readthedocs.io/en/latest/feature-guide/#custom-messages
    $errors = $ex->getMessages([
        'alnum' => '{{name}} must contain only letters and digits',
        'notEmpty' => '{{name}} must not be empty'
    ]);

    $messages = $ex->getMessages();

    foreach ($messages as $message) {
        echo $message . "<br>\n";
    }
}
