<?php
$num = $_POST['number'] ?? rand(1,100);
/*
if(isset($_POST['number'])) {
    $num = $_POST['number'];
} else {
    $num = rand(1,100);
}
*/
$message = "";
$guess = isset($_POST['guess']) ? htmlentities($_POST['guess']) : '';
$tries = isset($_POST['tries']) ? htmlentities($_POST['tries']) : -1;
$tries++;

if ($guess == '') {
    $message = "Welcome to my Guessing Game!";
} else if (!is_numeric($guess)) {
    $message = "Your guess is not a number";
} else if ($guess < $num) {
    $message = "Your guess is too low: " . $guess;
} else if ($guess > $num) {
    $message = "Your guess is too high: " . $guess;
} else {
    $message = "Congratulations - You are right";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Guessing Game</title>
</head>
<body>
<h1><?php print $message?></h1>
<h2>Your try number: #<?php print $tries?></h2>
<form method="post" action="<?= $_SERVER['PHP_SELF']?>">
    <input name="number" type="hidden" value="<?= $num ?>" />
    <input name="tries" type="hidden" value="<?= $tries?>" />
    <br />Type your guess here:
    <input type="text" name="guess" value="<?=$guess?>" />
    <input type="submit" value="Submit" />
</form>
</body>
</html>
