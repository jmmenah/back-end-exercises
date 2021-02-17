<?php
// database.php (model)

// 4 Steps Simple PHP MVC Example (What the Heck is MVC!?)
// https://code-boxx.com/simple-php-mvc-example/

/*
 * Model refers to the data structure in the framework. 
 * So in the case of a PHP-MYSQL application, our "model"
 * will be a database class that deals with all the database 
 * related queries and functions.
 */

class DB
{
    private $pdo = null;
    private $stmt = null;

// The constructor, will automatically connect to the database when the object is created. 
// Remember to change the connection settings to your own.
    function __construct()
    {
        try {
            $this->pdo = new PDO(
                "mysql:host=localhost;dbname=test;charset=utf8",
                "root", "root", [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]
            );
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

// The destructor, will automatically close the database connection when the object is destroyed.
    function __destruct()
    {
        if ($this->stmt !== null) {
            $this->stmt = null;
        }
        if ($this->pdo !== null) {
            $this->pdo = null;
        }
    }

// Runs a select query on the database and returns the results.
    function select($sql, $cond = null)
    {
        $result = false;
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute($cond);
            $result = $this->stmt->fetchAll();
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        $this->stmt = null;
        return $result;
    }
}

?>
