<?php
/*
 * Learn Object-oriented PHP
 * Magic methods and constants unveiled
 * https://phpenthusiast.com/object-oriented-php-tutorials/magic-methods-and-constants
 */

/*
 * Magic constants
 * In addition to magic methods, the PHP language offers several magic constants.
 * For example, we may use the magic constant __CLASS__ (magic constants are written in uppercase letters
 * and prefixed and suffixed with two underlines) in order to get the name of the class in which it resides.
 * Other magic constants that may be of help are:
 * __LINE__ to get the line number in which the constant is used.
 * __FILE__ to get the full path or the filename in which the constant is used.
 * __METHOD__ to get the name of the method in which the constant is used.
 */

class CarC {
    private $model = '';

    //__construct
    public function __construct($model = null)
    {
        if($model)
        {
            $this -> model = $model;
        }
    }

    public function getCarModel()
    {
        //We use the __CLASS__ magic constant in order to get the class name

        return " The <b>" . __CLASS__ . "</b> model is: " . $this -> model;
    }
}

$car1 = new CarC('Mercedes');

echo $car1 -> getCarModel();