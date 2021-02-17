<?php
/*
 * Learn Object-oriented PHP
 * Access modifiers: public vs. private
 * https://phpenthusiast.com/object-oriented-php-tutorials/access-modifiers-public-private
 * The public access modifier
 */

class CarA {

    // public methods and properties.
    public $model;

    public function getModel()
    {
        return "The car model is " . $this -> model;
    }
}
// the class’s property and method are defined as public,
// so the code outside the class can directly interact with them.
$mercedes = new Car();
//Here we access a property from outside the class
$mercedes -> model = "Mercedes";
//Here we access a method from outside the class
echo $mercedes -> getModel();
