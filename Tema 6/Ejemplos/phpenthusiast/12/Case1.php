<?php
/*
 * Learn Object-oriented PHP
 * Static methods and properties
 * https://phpenthusiast.com/object-oriented-php-tutorials/static-methods-and-properties
 */

/*
 * Use case 1: as counters
 * We use static properties as counters since they are able to save the last value that has been assigned to them.
 * For example, the method add1ToCars() adds 1 to the $numberOfCars property each time the method is called.
 */

class Utilis {
    // Hold the number of cars.
    static public $numberOfCars = 0;

    // Add 1 to the number of cars each time the method is called.
    static public function add1ToCars()
    {
        self::$numberOfCars++;
    }
}

echo Utilis::$numberOfCars;
echo '<br>';

Utilis::add1ToCars();
echo Utilis::$numberOfCars;
echo '<br>';

Utilis::add1ToCars();
echo Utilis::$numberOfCars;
echo '<br>';

Utilis::add1ToCars();
echo Utilis::$numberOfCars;