<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>High Value Card</title>
</head>
<body>
<?php
$roll1 = rand(1,10);
$roll2 = rand(1,10);
$roll3 = rand(1,10);
$max = max($roll1,$roll2,$roll3);
$image1 = "images/" . $roll1 . ".png";
$image2 = "images/" .$roll2 . ".png";
$image3 = "images/" .$roll3 . ".png";
?>
<h1>High Value Card</h1>
<input type="button" value="High Card" onclick="window.location.reload()">
<p>
    <img src="<?= $image1 ?>" alt="<?= $roll1 ?>" style="width: 100px" ">
    <img src="<?= $image2 ?>" alt="<?= $roll2 ?>" style="width: 100px" ">
    <img src="<?= $image3 ?>" alt="<?= $roll3 ?>" style="width: 100px" ">
</p>
<p style="border:3px solid blue;display: inline;padding: 15px;left: 7%;position: absolute">
    High Value: <?= $max; ?>
</p>
</body>
</html>
