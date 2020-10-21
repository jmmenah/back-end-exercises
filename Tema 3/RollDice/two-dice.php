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
$roll2 = rand(1,6);
$image1 = "images/HandRollingDice" . $roll1 . "_XL.gif";
$image2 = "images/HandRollingDice" . $roll2 . "_XL.gif";
$sum = $roll1 + $roll2;
if($sum<=6) {
    $pos = 50 + ($sum - 1) * 100;
    $ficha = "<circle cx=\"". $pos ."\" cy=\"50\" r=\"30\" stroke=\"black\" stroke-width=\"2\" fill=\"red\"></circle>";
}
else{
    $pos = 50 + ($sum - 7) * 100;
    $ficha = "<circle cx=\"". $pos ."\" cy=\"150\" r=\"30\" stroke=\"black\" stroke-width=\"2\" fill=\"red\"></circle>";
}

?>
<h1>Roll <?= $title ?? '' ?></h1>
<input type="button" value="Roll the dice" onclick="window.location.reload()">
<p>
    <img src="<?= $image1 ?>" alt="<?= $roll1 ?>"">
    <img src="<?= $image2 ?>" alt="<?= $roll2 ?>"">
</p>

<svg xmlns="http://www.w3.org/2000/svg" width="620" height="240" viewBox="-15 -15 620 240" style="background-color: white;" font-family="sans-serif">
    <!-- board game first row -->
    <rect x="0" y="0" width="100" height="100" stroke="black" stroke-width="1" fill="lightgray"></rect>
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
    <!-- second row -->
    <rect x="0" y="100" width="100" height="100" stroke="black" stroke-width="1" fill="none"></rect>
    <text x="50" y="180" text-anchor="middle" font-size="80" fill="lightgray">7</text>
    <rect x="100" y="100" width="100" height="100" stroke="black" stroke-width="1" fill="none"></rect>
    <text x="150" y="180" text-anchor="middle" font-size="80" fill="lightgray">8</text>
    <rect x="200" y="100" width="100" height="100" stroke="black" stroke-width="1" fill="none"></rect>
    <text x="250" y="180" text-anchor="middle" font-size="80" fill="lightgray">9</text>
    <rect x="300" y="100" width="100" height="100" stroke="black" stroke-width="1" fill="none"></rect>
    <text x="350" y="180" text-anchor="middle" font-size="80" fill="lightgray">10</text>
    <rect x="400" y="100" width="100" height="100" stroke="black" stroke-width="1" fill="none"></rect>
    <text x="450" y="180" text-anchor="middle" font-size="80" fill="lightgray">11</text>
    <text x="550" y="180" text-anchor="middle" font-size="80" fill="lightgray">12</text><rect x="500" y="100" width="100" height="100" stroke="black" stroke-width="1" fill="none"></rect>
    <!-- game piece -->
    <?php
    echo $ficha;
    ?>
</svg>
</body>
<?php include 'footer.php'; ?>
</html>
