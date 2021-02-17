<?php
/*
 * Learn Object-oriented PHP
 * Type hinting
 * https://phpenthusiast.com/object-oriented-php-tutorials/type-hinting
 */

// The function can only get array as an argument.
function calcNumMilesOnFullTank(array $models)
{
    foreach($models as $item)
    {
        echo $carModel = $item[0];
        echo " : ";
        echo $numberOfMiles = $item[1] * $item[2];
        echo "<br />";
    }
}

// First, let's try to pass to the function an argument which is not an array
//  Catchable fatal error: Argument 1 passed to calcNumMilesOnFullTank() must be of the type array, string given
calcNumMilesOnFullTank("Toyota");

$models = array(
    array('Toyota', 12, 44),
    array('BMW', 13, 41)
);

calcNumMilesOnFullTank($models);
