<?php
// PHP Respect Validation tutorial
// http://zetcode.com/php/respectvalidation/

// https://respect-validation.readthedocs.io/en/latest/rules/Alnum/
// https://respect-validation.readthedocs.io/en/latest/rules/Length/

require('vendor/autoload.php');

use Respect\Validation\Validator as v;

$name = "John";

$r = v::alnum()->length(4, null)->validate($name);

if ($r) {
    echo "Validation passed";
} else {
    echo "Validation failed";
}
