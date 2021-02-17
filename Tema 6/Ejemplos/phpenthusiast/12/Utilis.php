<?php
/*
 * Learn Object-oriented PHP
 * Static methods and properties
 * https://phpenthusiast.com/object-oriented-php-tutorials/static-methods-and-properties
 */

class Utilis {
    // static methods and properties are defined with the static keyword.
    static public $numCars = 0;

    static public function addToNumCars($int)
    {
        $int = (int)$int;
        self::$numCars += $int;
    }
}

echo Utilis::$numCars;
echo '<br>';

Utilis::addToNumCars(3);
echo Utilis::$numCars;
echo '<br>';

Utilis::addToNumCars(-1);
echo Utilis::$numCars;