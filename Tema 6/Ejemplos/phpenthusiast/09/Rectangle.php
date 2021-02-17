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

class Rectangle implements Shape {
    private $width;
    private $height;

    public function __construct($width, $height)
    {
        $this -> width = $width;
        $this -> height = $height;
    }

    // calcArea calculates the area of rectangles
    public function calcArea()
    {
        return $this -> width * $this -> height;
    }
}