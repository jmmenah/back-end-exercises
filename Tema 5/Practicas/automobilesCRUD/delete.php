<?php
require_once "pdo.php";

session_start();

if ( isset($_POST['delete']) && isset($_POST['autos_id']) ) {
    $sql = "DELETE FROM autoscrud WHERE autos_id = :zip";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':zip' => $_POST['autos_id']));
    $_SESSION['success'] = 'Record Deleted';
    header( 'Location: view.php' ) ;
    return;
}

// Guardian: Make sure that user_id is present
if ( ! isset($_GET['autos_id']) ) {
  $_SESSION['error'] = "Missing Parameter";
  header('Location: view.php');
  return;
}

$stmt = $pdo->prepare("SELECT autos_id, make FROM autoscrud where autos_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['autos_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Record Not Found';
    header( 'Location: view.php' ) ;
    return;
}

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
<div class="container">

<p>Confirm: Deleting <?= htmlentities($row['make']) ?></p>

<form method="post">
<input type="hidden" name="autos_id" value="<?= $row['autos_id'] ?>">
<input type="submit" value="Delete" name="delete">
<a href="view.php">Cancel</a>
</form>

</div>
