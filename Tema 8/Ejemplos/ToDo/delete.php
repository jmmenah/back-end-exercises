<?php 
/*
 * Build CRUD Application - PHP & Mysql 
 * Create Todo list app with pagination 
 * https://www.udemy.com/course/build-crud-application-php-mysql/
 *
 */

 include 'db.php'; 

$id = (int)$_GET['id'];


$sql = "delete from tasks where id = '$id'";


$val = $db->query($sql);

if($val){

header('location: index.php');

};



 ?>
