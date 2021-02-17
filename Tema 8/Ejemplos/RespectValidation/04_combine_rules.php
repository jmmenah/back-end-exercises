<?php
// PHP Respect Validation tutorial
// http://zetcode.com/php/respectvalidation/

// https://respect-validation.readthedocs.io/en/latest/rules/Alnum/
// https://respect-validation.readthedocs.io/en/latest/rules/Length/

// https://respect-validation.readthedocs.io/en/latest/rules/AllOf/

require('vendor/autoload.php');

use Respect\Validation\Validator as v;
use Respect\Validation\Rules;

$name = "John";

$nameValidator = new Rules\AllOf(
    new Rules\Alnum(),
    new Rules\Length(5, 40)
);

$r = $nameValidator->validate($name);

if ($r) {
    echo "Validation passed";
} else {
    echo "Validation failed";
}


