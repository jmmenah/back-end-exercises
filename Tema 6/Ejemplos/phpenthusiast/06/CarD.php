<?php
/*
 * Learn Object-oriented PHP
 * Inheritance in object-oriented PHP
 * https://phpenthusiast.com/object-oriented-php-tutorials/inheritance-in-object-oriented-php
 */

// The parent class
class CarD {
    //The $model property is now protected, so it can be accessed
    // from within the class and its child classes
    protected $model;

    //Public setter method
    public function setModel($model)
    {
        $this -> model = $model;
    }
}

// The child class
class SportsCar extends CarD {
    //Has no problem to get a protected property that belongs to the parent
    public function hello()
    {
        return "beep! I am a <i>" . $this -> model . "</i><br />";
    }
}

//Create an instance from the child class
$sportsCar1 = new SportsCar();

//Set the class model name
$sportsCar1 -> setModel('Mercedes Benz');

//Get the class model name
echo $sportsCar1 -> hello();