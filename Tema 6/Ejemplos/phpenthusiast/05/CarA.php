<?php
/*
 * Learn Object-oriented PHP
 * Magic methods and constants unveiled
 * https://phpenthusiast.com/object-oriented-php-tutorials/magic-methods-and-constants
 */

class CarA {

    private $model;

    //__construct
    public function __construct ($model)
    {
        $this -> model = $model;
    }

    public function getCarModel()
    {
        return ' The car model is: ' . $this -> model;
    }
}

// try to create a new object without assigning the value that the constructor needs, we will encounter an error.
//$carError = new CarA();

//We pass the value of the variable once we create the object
$car1 = new Car("Mercedes");

echo $car1 -> getCarModel();
