<?php
require_once "pdo.php";
// Demand a GET parameter
if ( ! isset($_GET['name']) || strlen($_GET['name']) < 1  ) {
    die('Name parameter missing');
}

// If the user requested logout go back to index.php
if ( isset($_POST['logout']) ) {
    header('Location: index.php');
    return;
}
$failure=false;
$stmt=false;
if ( isset($_POST['make']) && isset($_POST['year'])
    && isset($_POST['mileage'])) {
    if(strlen($_POST['make']) < 1){
        $failure="Make is required";
    }elseif (!is_numeric($_POST['year']) || !is_numeric($_POST['mileage']) ){
        $failure="Mileage and year must be numeric";
    }else{
        $stmt = $pdo->prepare('INSERT INTO autos
        (make, year, mileage) VALUES ( :mk, :yr, :mi)');
        $stmt->execute(array(
                ':mk' => htmlentities($_POST['make']),
                ':yr' => htmlentities(intval($_POST['year'])),
                ':mi' => htmlentities(intval($_POST['mileage'])))
        );
    }
}
    $query = "SELECT `make`, `year`, `mileage` FROM `autos`;";
    $doQuery = $pdo->query($query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Juanma's Automobile Tracker</title>
    <?php require_once "bootstrap.php"; ?>

</head>
<body>
<div class="container">
    <h1>Tracking Autos for <?=$_GET['name']?></h1>
    <?php
    // Note triple not equals and think how badly double
    // not equals would work here...
    if ( $failure !== false ) {
        // Look closely at the use of single and double quotes
        echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
    }elseif( $stmt !== false){
        echo('<p style="color: green;">Record inserted'."</p>\n");
    }else{
        echo("");
    }
    ?>
    <form method="post">
        <p>Make:
            <input type="text" name="make" size="60"/></p>
        <p>Year:
            <input type="text" name="year"/></p>
        <p>Mileage:
            <input type="text" name="mileage"/></p>
        <input type="submit" value="Add">
        <input type="submit" name="logout" value="Logout">
    </form>
    <h2>Automobiles</h2>
    <ul>
        <?php
            while ($row = $doQuery->fetch(PDO::FETCH_ASSOC)) {
                echo "<li>" . $row["make"] . " " . $row["year"] . " / " . $row["mileage"] ."</li>\n";
            }
        ?>
    </ul>
