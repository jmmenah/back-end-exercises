<!DOCTYPE html>
<html lang="en">
<head>
    <title>Book-O-Rama Book Entry Results (PDO)</title>
</head>
<body>
<h1>Book-O-Rama Book Entry Results (PDO)</h1>
<?php

if (!isset($_POST['ISBN']) || !isset($_POST['Author'])
    || !isset($_POST['Title']) || !isset($_POST['Price'])) {
    echo "<p>You have not entered all the required details.<br />
             Please go back and try again.</p>";
    exit;
}

// create short variable names
$isbn = $_POST['ISBN'];
$author = $_POST['Author'];
$title = $_POST['Title'];
$price = $_POST['Price'];
// doubleval — Alias of floatval(). floatval — Get float value of a variable
// https://www.php.net/manual/en/function.floatval.php
$price = doubleval($price);

// set up for using PDO
$user = 'bookorama';
$pass = 'bookorama123';
$host = 'localhost';
$db_name = 'books';

// set up DSN
$dsn = "mysql:host=$host;dbname=$db_name";

try {
    // connect to database
    $db = new PDO($dsn, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // perform query
    $query = "INSERT INTO Books VALUES (:isbn, :author, :title, :price)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':isbn', $isbn, PDO::PARAM_STR, 13);
    $stmt->bindParam(':author', $author, PDO::PARAM_STR, 50);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR, 100);
    $stmt->bindParam(':price', $price);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo "<p>Book inserted into the database.</p>";
    } else {
        echo "<p>An error has occurred.<br/>
              The item was not added.</p>";
    }
} catch (PDOException $e) {
    echo "<p>Error: Could not connect to database.<br/>
             Please try again later.</p>";
    echo $e->getMessage();
    exit;
}
// disconnect from database
$db = null;
?>
</body>
</html>
