<?php
function sendCookies() {
    $n = rand(1,100);
    setcookie('number', $n, time() + 3600); 
    setcookie('tries', 0, time() + 3600); 
    return $n;
}

function deleteCookies() {
    setcookie('number', '', time() - 3600); 
    setcookie('tries', '', time() - 3600); 
}

$num =  $_COOKIE['number'] ?? sendCookies();
$message = "";
$guess = isset($_POST['guess']) ? htmlentities($_POST['guess']) : '';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $tries = 0;
} else if (isset($_COOKIE['tries'])) {
    $tries = ++$_COOKIE['tries'];
    setcookie('tries', $tries); 
}

if ($guess == '') {
    $message = "Welcome to my Guessing Game!";
} else if (!is_numeric($guess)) {
    $message = "Your guess is not a number";
} else if ($guess < $num) {
    $message = "Your guess is too low: " . $guess;
} else if ($guess > $num) {
    $message = "Your guess is too high: " . $guess;
} else {
    $message = "Congratulations - You are right (wait 4 seconds to reload)";
    deleteCookies();
    // Reload page after 4 seconds
    header("Refresh: 4; url=$_SERVER[PHP_SELF]");
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
    <br />Type your guess here:
    <input type="text" name="guess" value="<?=$guess?>" />
    <input type="submit" value="Submit" />
</form>
</body>
</html>
