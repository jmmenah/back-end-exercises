<?php
/*
 * Learn Object-oriented PHP
 * Access modifiers: public vs. private
 * https://phpenthusiast.com/object-oriented-php-tutorials/access-modifiers-public-private
 * The private access modifier
 */

// In the following example, we define the property $model as private,
// and when we try to set its value from outside the class, we encounter a fatal error.
class CarB {

    //private
    private $model;

    public function getModel()
    {
        return "The car model is " . $this -> model;
    }
}

$mercedes = new CarB();

// We try to access a private property from outside the class.
$mercedes -> model = "Mercedes benz";
echo $mercedes -> getModel();