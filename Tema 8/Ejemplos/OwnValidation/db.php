<?php

// Create Your Own PHP Form Validation Library
// https://www.mywebcode.com/create-php-form-validation-library/

class db
{
    public $connect;

    public function __construct()
    {
        try {
            $this->connect = new PDO("mysql:host=localhost;dbname=example", 'root', '');
        } catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
    }
}

?>
