<?php
/*
 * Learn Object-oriented PHP
 * Inheritance in object-oriented PHP
 * https://phpenthusiast.com/object-oriented-php-tutorials/inheritance-in-object-oriented-php
 */

// The parent class
class CarC {
    //The $model property is private, thus it can be accessed
    // only from inside the class
    private $model;

    //Public setter method
    public function setModel($model)
    {
        $this -> model = $model;
    }
}


// The child class
class SportsCar extends CarC{
    //Tries to get a private property that belongs to the parent
    /*
     * We get an error because the hello() method in the child class is trying to approach
     * a private property, $model, that belongs to the parent class.
     */
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