<?php
//  Client Side Form Validation using Parsley.js with PHP Ajax
//  https://www.webslesson.info/2018/09/client-side-form-validation-using-parsleyjs-with-php-ajax.html

//action.php

sleep(3);

if (isset($_POST['first_name'])) {
    $connect = new PDO("mysql:host=localhost;dbname=testing", "root", "root");

    $data = array(
        ':first_name' => $_POST['first_name'],
        ':last_name' => $_POST['last_name'],
        ':email' => $_POST['email'],
        ':password' => $_POST['password'],
        ':website' => $_POST['website']
    );

    $query = "
 INSERT INTO tbl_register 
 (first_name, last_name, email, password, website) 
 VALUES (:first_name, :last_name, :email, :password, :website)
 ";
    $statement = $connect->prepare($query);
    if ($statement->execute($data)) {
        echo 'Registration Completed Successfully...';
    }
}

?>
