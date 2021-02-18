<?php 

/*
 * Build CRUD Application - PHP & Mysql 
 * Create Todo list app with pagination 
 * https://www.udemy.com/course/build-crud-application-php-mysql/
 *
 */


include 'db.php';

if(isset($_POST['send'])){


$name = htmlspecialchars($_POST['task']);


$sql = "insert into tasks (name) values ('$name')";

$val = $db->query($sql);

if($val){

	header('location: index.php');
}else{

	echo "error";
}

}



 ?>
