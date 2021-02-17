<?php
// Preparing chapters 9,10 and 11 from 
// "PHP and MySQL Web Development" 5th Edition book
// By Luke Welling and Laura Thomson
// https://www.pearson.com/us/higher-education/program/Welling-PHP-and-My-SQL-Web-Development-5th-Edition/PGM38406.html

$host = "localhost";
$database = "books";
$user = "bookorama";
$password = "bookorama123";

echo '<p>script start...</p>';

# Connecting to MySQL with PDO 
# Caution: using root user 

try {
    $db = new PDO("mysql:host=$host", "root", "root");
} catch (PDOException $e) {
    echo "Error root connection: " . $e->getMessage();
    exit;
}

try {
    $db->query("drop database IF EXISTS $database");
    $db->query("drop user $user@$host");

    $db->query("create database $database");
    $db->query("create user $user@$host identified by '$password'");
    $db->query("grant all on $database.* to $user@$host");
    $db = null; // close root connection

    // New connection for the newly created user
    $db = new PDO("mysql:host=$host;dbname=$database", $user, $password);

    $query = file_get_contents("bookorama.sql");
    $stmt = $db->prepare($query);
    if ($stmt->execute()) echo "<b style='color:green'>bookorama.sql Success</b>";
    else echo "<b style='color:red'>bookorama.sql Fail</b>";
    $stmt = null;

    echo "<br>";

    $query = file_get_contents("book_insert.sql");
    $stmt = $db->prepare($query);
    if ($stmt->execute()) echo "<b style='color:green'>book_insert.sql Success</b>";
    else echo "<b style='color:red'>book_insert.sql Fail</b>";
    $stmt = null;

    $db = null; // close $user connection
    echo "<br><strong>Finished script!!!</strong>";
} catch (PDOException $e) {
    echo "PDO Error: " . $e->getMessage();
    exit;
} catch (Exception $e) {
    echo "File Error: " . $e->getMessage();
    exit;
}

