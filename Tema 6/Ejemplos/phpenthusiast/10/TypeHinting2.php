<?php
/*
 * Learn Object-oriented PHP
 * Type hinting
 * https://phpenthusiast.com/object-oriented-php-tutorials/type-hinting
 */

/*
 * How to do object type hinting?
 * Type hinting can also be used to force a function to get an argument of type Object.
 * For this purpose, we put the name of the class in front of the argument name in the function.
 *
 * In the following example, the class's constructor can only get objects that were created from the Driver class.
 * We ensure this by putting the word Driver in front of the argument name in the constructor.
 */

class Car {
    protected $driver;

    // The constructor can only get Driver objects as arguments.
    public function __construct(Driver $driver)
    {
        $this -> driver = $driver;
    }
}


class Driver {}


$driver1 = new Driver();
$car1    = new Car($driver1);
