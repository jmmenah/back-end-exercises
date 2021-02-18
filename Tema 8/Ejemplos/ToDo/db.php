<?php 
/*
 * Build CRUD Application - PHP & Mysql 
 * Create Todo list app with pagination 
 * https://www.udemy.com/course/build-crud-application-php-mysql/
 *
 */

//$db = new Mysqli;
//$db->connect('localhost','root','','crud');

$db = new PDO('mysql:host=localhost;dbname=crud', 'root', '');

if(!$db){

	echo "success";
}



 ?>
