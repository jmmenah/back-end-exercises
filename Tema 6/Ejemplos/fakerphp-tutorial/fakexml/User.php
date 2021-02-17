<?php
/*
 * PHP Faker tutorial
 * http://zetcode.com/php/faker/
 *
 */
class User
{
    public $firstName;
    public $lastName;
    public $occupation;

    function __construct(string $first, string $last, string $occupation) 
    {
        $this->firstName = $first;
        $this->lastName = $last;
        $this->occupation = $occupation;
    }
}
