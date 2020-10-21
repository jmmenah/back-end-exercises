<?php include "header.php"?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rolling <?= $title ?? '' ?></title>
</head>
<body>
<?php
$roll1 = rand(1,6);
$image1 = "images/HandRollingDice" . $roll1 . "_XL.gif";
$pos = 50+($roll1-1)*100;
$ficha = "<circle cx=\"". $pos ."\" cy=\"50\" r=\"30\" stroke=\"black\" stroke-width=\"2\" fill=\"red\"></circle>";

?>
<h1>Roll <?= $title ?? '' ?></h1>
<input type="button" value="Roll the dice" onclick="window.location.reload()">
<p>
    <img src="<?= $image1 ?>" alt="<?= $roll1 ?>"">
</p>
    <svg xmlns="http://www.w3.org/2000/svg" width="620" height="240" viewBox="-15 -15 620 240" style="background-color: white;" font-family="sans-serif">
        <!-- board game -->
        <rect x="0" y="0" width="100" height="100" stroke="black" stroke-width="1" fill="none"></rect>
        <text x="50" y="80" text-anchor="middle" font-size="80" fill="lightgray">1</text>
        <rect x="100" y="0" width="100" height="100" stroke="black" stroke-width="1" fill="none"></rect>
        <text x="150" y="80" text-anchor="middle" font-size="80" fill="lightgray">2</text>
        <rect x="200" y="0" width="100" height="100" stroke="black" stroke-width="1" fill="none"></rect>
        <text x="250" y="80" text-anchor="middle" font-size="80" fill="lightgray">3</text>
        <rect x="300" y="0" width="100" height="100" stroke="black" stroke-width="1" fill="none"></rect>
        <text x="350" y="80" text-anchor="middle" font-size="80" fill="lightgray">4</text>
        <rect x="400" y="0" width="100" height="100" stroke="black" stroke-width="1" fill="none"></rect>
        <text x="450" y="80" text-anchor="middle" font-size="80" fill="lightgray">5</text>
        <rect x="500" y="0" width="100" height="100" stroke="black" stroke-width="1" fill="none"></rect>
        <text x="550" y="80" text-anchor="middle" font-size="80" fill="lightgray">6</text>
        <!-- game piece -->
        <?php
        echo $ficha;
        ?>
    </svg>
</body>
<?php include 'footer.php'; ?>
</html>