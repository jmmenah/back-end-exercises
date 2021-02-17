<?php
session_start();

if ( ! isset($_SESSION['email']) ) {
    die('Not logged in');
} else {
    $name = $_SESSION['email'];
}

// If the user requested logout go back to index.php
if ( isset($_POST['logout']) ) {
    header('Location: index.php');
    return;
}


?>
<!DOCTYPE html>
<html>
<head>
<title>a517c041 Tracking Autos</title>
<?php

require_once "bootstrap.php";
require_once "pdo.php";


?>
</head>
<body>
<div class="container">
<h1>Tracking Autos for <?php echo  htmlentities($name); ?></h1>

<?php
if ( isset($_SESSION['success']) ) {
    echo('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
    unset($_SESSION['success']);
}

 ?>

<table border="1">
  <?php
  echo "<ul>";
  $stmt = $pdo->query("SELECT make, year, mileage FROM autos");
  while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
      echo "<li>";

      echo htmlentities($row['year'] . "  " . $row['make'] . "  " . $row['mileage']);

      echo("</li>\n");
  }
  ?>
</table>

  <p><a href="add.php">Add New</a> | <a href="logout.php">Logout</a></p>

</div>
</body>
</html>
