<?php
/*
 * Learn Object-oriented PHP
 * Type hinting
 * https://phpenthusiast.com/object-oriented-php-tutorials/type-hinting
 */

/*
Does PHP support type hinting to basic data types?

    It depends.

    Whereas PHP5 doesn’t allow type hinting for basic data types (integers, floats, strings and booleans),
    PHP7 does support scalar type hinting.

PHP5 does not support type hinting to basic data types like integers, booleans or strings.
So, when we need to validate that an argument belongs to a basic data type, we can use one of PHP’s “is_” family functions.
For example:

is_bool - to find out whether a variable is a boolean (true or false).
is_int - to find out whether a variable is an integer.
is_float - to find out whether a variable is a float (3.14, 1.2e3 or 3E-10).
is_null - to find out whether a variable is null.
is_string - to find out whether a variable is a string.

On the other hand, PHP7 does support scalar type hinting. The supported types are: integers, floats, strings, and booleans.

The following code example can only work in PHP7.
*/

class car {
    protected $model;
    protected $hasSunRoof;
    protected $numberOfDoors;
    protected $price;

    // string type hinting
    public function setModel(string $model)
    {
        $this->model = $model;
    }

    // boolean type hinting
    public function setHasSunRoof(bool $value)
    {
        $this->hasSunRoof = $value;
    }

    // integer type hinting
    public function setNumberOfDoors(int $value)
    {
        $this->numberOfDoors = $value;
    }

    // float type hinting
    public function setPrice(float $value)
    {
        $this->price = $value;
    }
}