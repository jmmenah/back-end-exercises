<?php
/*
 * Learn Object-oriented PHP
 * Abstract classes and methods
 * https://phpenthusiast.com/object-oriented-php-tutorials/abstract-classes-and-methods
 */

abstract class Car {
    // Abstract classes can have properties
    protected $tankVolume;

    // Abstract classes can have non abstract methods
    public function setTankVolume($volume)
    {
        $this -> tankVolume = $volume;
    }

    // Abstract method
    abstract public function calcNumMilesOnFullTank();
}

// Let's create a child class with the name of Honda, and define in it the abstract method
// that it inherited from the parent, calcNumMilesOnFullTank().
class Honda extends Car {
    // Since we inherited abstract method, we need to define it in the child class,
    // by adding code to the method's body.
    public function calcNumMilesOnFullTank()
    {
        $miles = $this -> tankVolume*30;
        return $miles;
    }
}

// We can create another child class from the Car abstract class and call it Toyota, and here again define
// the abstract method calcNumMilesOnFullTank() with a slight change in the calculation.
// We will also add to the child class its own method with the name of getColor() that returns the string "beige".
Class Toyota extends Car {
    // Since we inherited abstract method, we need to define it in the child class,
    // by adding code to the method's body.
    public function calcNumMilesOnFullTank()
    {
        return $miles = $this -> tankVolume*33;
    }

    public function getColor()
    {
        return "beige";
    }
}

//  Let's create a new object, $toyota1, with volume of 10 Gallons,
//  and let it return the number of miles on full tank and the car's color.

$toyota1 = new Toyota();
$toyota1 -> setTankVolume(10);
echo $toyota1 -> calcNumMilesOnFullTank();//330
echo '<br>';
echo $toyota1 -> getColor();//beige