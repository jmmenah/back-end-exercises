<?php
/*
 * Learn Object-oriented PHP
 * Inheritance in object-oriented PHP
 * https://phpenthusiast.com/object-oriented-php-tutorials/inheritance-in-object-oriented-php
 * How to override the parent’s properties and methods in the child class?
 */

//  we create a hello() method in the parent class that returns the string "beep" and override it
//  in the child class with a method by the same name that returns a different string, "Halllo".

// The parent class has hello method that returns "beep".
class CarE {
    public function hello()
    {
        return "beep";
    }
}

//The child class has hello method that returns "Halllo"
class SportsCar extends CarE {
    public function hello()
    {
        return "Hallo";
    }
}

//Create a new object
$sportsCar1 = new SportsCar();

//Get the result of the hello method
echo $sportsCar1 -> hello();
