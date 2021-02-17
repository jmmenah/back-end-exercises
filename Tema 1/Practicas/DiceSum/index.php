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
$roll1 = rand(1,6);
$roll2 = rand(1,6);
$sum=$roll2+$roll1;
$image1 = "images/HandRollingDice" . $roll1 . "_XL.gif";
$image2 = "images/HandRollingDice" . $roll2 . "_XL.gif";
?>
<input type="button" value="Roll the dice" onclick="window.location.reload()">
<p>
    <img src="<?= $image1 ?>" alt="<?= $roll1 ?>"">
    <img src="<?= $image2 ?>" alt="<?= $roll2 ?>"">
</p>
<p style="border:3px solid blue;display: inline;padding: 15px;left: 5%;position: absolute">
    Total: <?= $sum; ?>
</h1>

</body>
</html>
