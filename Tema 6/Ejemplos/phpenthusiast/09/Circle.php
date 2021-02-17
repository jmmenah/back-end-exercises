<?php
/*
 * Learn Object-oriented PHP
 * Polymorphism in PHP
 * https://phpenthusiast.com/object-oriented-php-tutorials/polymorphism-in-php
 */

// According to the Polymorphism principle, methods in different classes
// that do similar things should have the same name.
// In order to implement the polymorphism principle, we can choose between abstract classes and interfaces.

require_once 'Shape.php';

class Circle implements Shape {
    private $radius;

    public function __construct($radius)
    {
        $this -> radius = $radius;
    }

    // calcArea calculates the area of circles
    public function calcArea()
    {
        return $this -> radius * $this -> radius * pi();
    }
}