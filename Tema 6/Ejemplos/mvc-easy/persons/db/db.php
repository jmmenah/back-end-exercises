<?php

class Connection{
    public static function connect(){
        $pdo = new PDO(
            'mysql:host=localhost;dbname=mvc',
            'root',
            'root',
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );
        return $pdo;
    }
}