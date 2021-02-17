<?php
/*
 * Learn Object-oriented PHP
 * Access modifiers: public vs. private
 * https://phpenthusiast.com/object-oriented-php-tutorials/access-modifiers-public-private
 * Setters that set the values of the private properties.
 * Getters that get the values of the private properties.
 */

class CarC {
//the private access modifier denies access to the method from outside the class’s scope
    private $model;

    //the public access modifier allows the access to the method from outside the class
    public function setModel($model)
    {
        $this -> model = $model;
    }

    public function getModel()
    {
        return "The car model is  " . $this -> model;
    }
}

$mercedes = new CarC();
//Sets the car’s model
$mercedes -> setModel("Mercedes benz");
//Gets the car’s model
echo $mercedes -> getModel();
