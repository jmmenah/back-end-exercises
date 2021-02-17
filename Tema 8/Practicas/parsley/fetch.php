<?php

//fetch.php;

if(isset($_POST["email"]))
{
 $connect = new PDO("mysql:host=localhost; dbname=testing", "root", "");

 $query = "
 SELECT * FROM register_user 
 WHERE user_email = '".trim($_POST["email"])."'
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 $total_row = $statement->rowCount();

 if($total_row == 0)
 {
  $output = array(
   'success' => true
  );

  echo json_encode($output);
 }
}

?>