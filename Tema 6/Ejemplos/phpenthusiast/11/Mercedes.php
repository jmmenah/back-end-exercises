<?php
/*
 * Learn Object-oriented PHP
 * Type hinting for interfaces
 * https://phpenthusiast.com/object-oriented-php-tutorials/type-hinting-for-interfaces
 */

class Mercedes {
    protected $model;
    protected $radius;
    protected $height;

    public function __construct($model, $radius, $height)
    {
        $this -> model = $model;
        $this -> radius = $radius;
        $this -> height = $height;
    }

    // Calculates the volume of cylinder
    public function calcTankVolume()
    {
        return $this -> radius * $this -> radius * pi() * $this -> height;
    }
}

//  Catchable fatal error: Argument 1 passed to calcTankPrice() must be an instance of Bmw, instance of Mercedes given
$mercedes1 = new Mercedes('12189796', 7, 28);
echo calcTankPrice($mercedes1, 3);