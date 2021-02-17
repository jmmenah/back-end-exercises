<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hand Rolling Dice</title>
</head>
<body>
<?php
$roll = rand(1,6);
$image = "images/HandRollingDice" . $roll . "_XL.gif";
?>
<input type="button" value="Roll the dice" onclick="window.location.reload()">
<p>
<img src="<?= $image ?>" alt="<?= $roll ?>" onclick="window.location.reload()">
</p>
</body>
</html>
