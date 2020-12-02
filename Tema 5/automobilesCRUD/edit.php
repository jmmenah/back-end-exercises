<?php
require_once "pdo.php";

session_start();

if ( isset($_POST['make']) && isset($_POST['model'])
     && isset($_POST['year']) && isset($_POST['mileage']) ) {

if (strlen($_POST['make']) < 1) {

    $_SESSION["error"] = "All values are required";
    header( 'Location: edit.php?autos_id='.$_GET['autos_id'] ) ;
    return;

} else if (is_numeric ( $_POST['year']) && is_numeric ( $_POST['mileage'])) {
    // Data validation should go here (see add.php)
    $sql = "UPDATE autoscrud SET make = :make,
            model = :model, year = :year, mileage = :mileage
            WHERE autos_id = :autos_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':make' => $_POST['make'],
        ':model' => $_POST['model'],
        ':year' => $_POST['year'],
        ':mileage' => $_POST['mileage'],
        ':autos_id' => $_POST['autos_id']));
    $_SESSION['success'] = 'Record Updated';
    header( 'Location: view.php' ) ;
    return;
} else {

    $_SESSION["error"] = "Mileage and year must be numeric";
    header( 'Location: edit.php?autos_id='.$_GET['autos_id'] ) ;
    return;

}
}

/// Guardian: Make sure that user_id is present
if ( ! isset($_GET['autos_id']) ) {
  $_SESSION['error'] = "Missing Parameter";
  header('Location: view.php');
  return;
}

$stmt = $pdo->prepare("SELECT * FROM autoscrud where autos_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['autos_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Sorry, Something Went Wrong';
    header( 'Location: view.php' ) ;
    return;
}

$n = htmlentities($row['make']);
$e = htmlentities($row['model']);
$p = htmlentities($row['year']);
$m = htmlentities($row['mileage']);
$autos_id = $row['autos_id'];
?>
<!DOCTYPE html>
<html>
<head>
<title>fcde6b65 | Tracking Autos</title>
<?php

require_once "bootstrap.php";

?>
</head>
<body>

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

<p>Edit Auto</p>
<form method="post">
<p>Make:
<input type="text" name="make" value="<?= $n ?>"></p>
<p>Model:
<input type="text" name="model" value="<?= $e ?>"></p>
<p>Year:
<input type="text" name="year" value="<?= $p ?>"></p>
<p>Mileage:
<input type="text" name="mileage" value="<?= $m ?>"></p>
<input type="hidden" name="autos_id" value="<?= $autos_id ?>">
<p><input type="submit" value="Save"/>
<a href="view.php">Cancel</a></p>
</form>

</body>
</html>
