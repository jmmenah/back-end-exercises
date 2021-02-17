<?php
/*
 * Learn Object-oriented PHP
 * Magic methods and constants unveiled
 * https://phpenthusiast.com/object-oriented-php-tutorials/magic-methods-and-constants
 */

class CarB {
    // The $model property has a default value of "N/A"
    private $model = "N/A";

    // We don’t have to assign a value to the $model property
    //since it already has a default value
    public function __construct($model = null)
    {
        // Only if the model value is passed it will be assigned
        if($model)
        {
            $this -> model = $model;
        }
    }

    public function getCarModel()
    {
        return ' The car model is: ' . $this -> model;
    }
}

//We create the new Car object without passing a value to the model
$car1 = new CarB();

echo $car1 -> getCarModel();

echo '<br>';

//We create the new Car object with the value of the model
$car2 = new CarB('Mercedes');

echo $car2 -> getCarModel();