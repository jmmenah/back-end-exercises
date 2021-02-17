<?php
/*
 * Learn Object-oriented PHP
 * Interfaces - the next level of abstraction
 * https://phpenthusiast.com/object-oriented-php-tutorials/interfaces
 */

// Interfaces, like abstract classes, include abstract methods and constants.
// However, unlike abstract classes, interfaces can have only public methods, and cannot have variables.

interface Car {
    public function setModel($name);

    public function getModel();
}

interface Vehicle {
    public function setHasWheels($bool);

    public function getHasWheels();
}

class miniCar implements Car, Vehicle {
    private $model;
    private $hasWheels;

    public function setModel($name)
    {
        $this -> model = $name;
    }

    public function getModel()
    {
        return $this -> model;
    }

    public function setHasWheels($bool)
    {
        $this -> hasWheels = $bool;
    }

    public function getHasWheels()
    {
        return ($this -> hasWheels)? "has wheels" : "no wheels";
    }
}

/*
 * What are the differences between abstract classes and interfaces?
 *
 * We saw that abstract classes and interfaces are similar in that they provide abstract methods
 * that must be implemented in the child classes. However, they still have the following differences:
 *
 *  Interfaces can include abstract methods and constants, but cannot contain concrete methods and variables.
 *  All the methods in the interface must be in the public visibility scope.
 *  A class can implement more than one interface, while it can inherit from only one abstract class.
 *
 */