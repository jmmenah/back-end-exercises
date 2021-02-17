<?php

session_start();

if ( ! isset($_SESSION['email']) ) {
    die('Not logged in');
} else {
    $name = $_SESSION['email'];
}

if ( isset($_POST['cancel'] ) ) {
    // Redirect the browser to game.php
    header("Location: view.php");
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

if ( isset($_POST['make']) && isset($_POST['year'])
     && isset($_POST['mileage'])) {

  if (strlen($_POST['make']) < 1) {

    $_SESSION["error"] = "Make is required";
    header( 'Location: add.php' ) ;
    return;

  } else if (is_numeric ( $_POST['year']) && is_numeric ( $_POST['mileage'])) {

    $stmt = $pdo->prepare('INSERT INTO autos
            (make, year, mileage) VALUES ( :mk, :yr, :mi)');
        $stmt->execute(array(
            ':mk' => $_POST['make'],
            ':yr' => $_POST['year'],
            ':mi' => $_POST['mileage'])
        );

        $_SESSION['success'] = "Record inserted";
        header("Location: view.php");
        return;

  } else {

    $_SESSION["error"] = "Mileage and year must be numeric";
    header( 'Location: add.php' ) ;
    return;

  }


} // end global if

?>
</head>
<body>
<div class="container">
<h1>Tracking Autos  for <?php echo  htmlentities($name); ?></h1>
<?php


if ( isset($_SESSION["error"]) ) {
      echo('<p style="color:red">'.$_SESSION["error"]."</p>\n");
      unset($_SESSION["error"]);
  }

?>
<form method="post">

  <p>Make:<input type="text" name="make" size="40"></p>
  <p>Year:<input type="text" name="year"></p>
  <p>Mileage:<input type="text" name="mileage"></p>
  <p><input type="submit" name="add" value="Add"/><input type="submit" name="cancel" value="Cancel"></p>

</form>

</div>
</body>
</html>
