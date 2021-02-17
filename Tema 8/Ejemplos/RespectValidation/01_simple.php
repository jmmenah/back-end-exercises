<?php
// PHP Respect Validation tutorial
// http://zetcode.com/php/respectvalidation/

// Pay attention to the version change
// https://respect-validation.readthedocs.io/en/1.1/rules/Alnum/
// v::alnum()->validate('foo 123'); // true
// https://respect-validation.readthedocs.io/en/latest/rules/Alnum/
// v::alnum()->validate('foo 123'); // false

require('vendor/autoload.php');

use Respect\Validation\Validator as v;

$name = "John Doe";

$r = v::alnum()->validate($name);
//$r = v::alnum(' ')->validate($name);

if ($r) {
    echo "Validation passed";
} else {
    echo "Validation failed";
}

