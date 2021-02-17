<?php
/*
 * Learn Object-oriented PHP
 * Inheritance in object-oriented PHP
 * https://phpenthusiast.com/object-oriented-php-tutorials/inheritance-in-object-oriented-php
 * How to prevent the child class from overriding the parent’s methods?
 */

// In order to prevent the method in the child class from overriding the parent’s methods,
// we can prefix the method in the parent with the final keyword.

// The parent class has hello method that returns "beep".

class CarF {
    final public function hello()
    {
        return "beep";
    }
}

//The child class has hello method that tries to override the hello method in the parent
class SportsCar extends CarF {
    public function hello()
    {
        return "Hallo";
    }
}


//Create a new object
$sportsCar1 = new SportsCar();

//Get the result of the hello method
echo $sportsCar1 -> hello();