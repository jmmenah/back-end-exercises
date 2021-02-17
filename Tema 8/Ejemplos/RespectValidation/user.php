<?php
// PHP Respect Validation tutorial
// http://zetcode.com/php/respectvalidation/

// See 07_validate_object.php

class User {

    private $name;
    private $email;

    public function getName() : string {

        return $this->name;
    }

    public function setName($name) : void {

        $this->name = $name;
    }

    public function getEmail() : string {

        return $this->email;
    }

    public function setEmail($email) : void {

        $this->email = $email;
    }
}

