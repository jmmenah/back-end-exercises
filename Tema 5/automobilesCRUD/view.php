<?php
session_start();

if ( ! isset($_SESSION['email']) ) {
    die('ACCESS DENIED');
} else {
    $name = $_SESSION['email'];
}

// If the user requested logout go back to index.php
if ( isset($_POST['logout']) ) {
    header('Location: logout.php');
    return;
}

?>
<!DOCTYPE html>
<html>
<head>
<title>fcde6b65 | Tracking Autos</title>
<?php

require_once "bootstrap.php";
require_once "pdo.php";


?>

<style>
table, tr, th, td {
   border: 1px solid black;
}
</style>

</head>
<body>
<div class="container">
<h1>Welcome to the Automobiles Database</h1>

<?php
if ( isset($_SESSION['success']) ) {
    echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
    unset($_SESSION['success']);
}

if ( isset($_SESSION['error']) ) {
    echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
    unset($_SESSION['error']);
}
?>

<table>

<tr>
  <th>Make</th>
  <th>Model</th>
  <th>Year</th>
  <th>Mileage</th>
  <th>Action</th>
</tr>

  <?php

  $stmt = $pdo->query("SELECT autos_id, make, model, year, mileage FROM autoscrud");
  while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    echo "<tr><td>";
    echo(htmlentities($row['make']));
    echo("</td><td>");
    echo(htmlentities($row['model']));
    echo("</td><td>");
    echo(htmlentities($row['year']));
    echo("</td><td>");
    echo(htmlentities($row['mileage']));
    echo("</td><td>");
    echo('<a href="edit.php?autos_id='.$row['autos_id'].'">Edit</a> / ');
    echo('<a href="delete.php?autos_id='.$row['autos_id'].'">Delete</a>');
    echo("</td></tr>\n");
  }
  ?>
</table>
</br>
  <p><a href="add.php">Add New Entry</a></p>
  <p><a href="logout.php">Logout</a></p>

</div>
</body>
</html>
