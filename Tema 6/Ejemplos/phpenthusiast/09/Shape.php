<?php
/*
 * Learn Object-oriented PHP
 * Polymorphism in PHP
 * https://phpenthusiast.com/object-oriented-php-tutorials/polymorphism-in-php
 */

// According to the Polymorphism principle, methods in different classes
// that do similar things should have the same name.
// In order to implement the polymorphism principle, we can choose between abstract classes and interfaces.

interface Shape {
    public function calcArea();
}
