<?php
// PHP Respect Validation tutorial
// http://zetcode.com/php/respectvalidation/

// https://respect-validation.readthedocs.io/en/1.1/rules/Alnum/
// https://respect-validation.readthedocs.io/en/latest/rules/Alnum/

require('vendor/autoload.php');

use Respect\Validation\Validator as v;

$name = "Vane-Tempest-Stewart";

$r = v::alnum('-')->validate($name);

if ($r) {
    echo "Validation passed";
} else {
    echo "Validation failed";
}

