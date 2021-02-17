<?php
// PHP Respect Validation tutorial
// http://zetcode.com/php/respectvalidation/

// https://respect-validation.readthedocs.io/en/latest/rules/Between/
// https://respect-validation.readthedocs.io/en/latest/rules/IntVal/
// https://respect-validation.readthedocs.io/en/latest/rules/StringType/
// https://respect-validation.readthedocs.io/en/latest/rules/Date/

require('vendor/autoload.php');

use Respect\Validation\Validator as v;

$age = 34;

$r = v::intVal()->between(18, 99)->validate($age);

if ($r) {
    echo "Age validation passed<br>\n";
} else {
    echo "Age validation failed<br>\n";
}

$char = 'g';

$r = v::stringType()->between('a', 'c')->validate($char);

if ($r) {
    echo "Letter validation passed<br>\n";
} else {
    echo "Letter validation failed<br>\n";
}

$myDate = '2013-01-01';

$r = v::date()->between('2009-01-01', '2019-01-01')->validate($myDate);

if ($r) {
    echo "Date validation passed<br>\n";
} else {
    echo "Date validation failed<br>\n";
}

