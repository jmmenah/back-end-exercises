<?php
require_once __DIR__ . '/vendor/autoload.php';

use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;

// Get your Tokens from Dropbox and update the three next variables
$authorizationToken = "";

$client_id = "";

$client_secret = "";

//Configure Dropbox Application
//$app = new DropboxApp("client_id", "client_secret", "access_token");

$app = new DropboxApp($client_id, $client_secret, $authorizationToken);

//Configure Dropbox service
$dropbox = new Dropbox($app);

$listFolderContents = $dropbox->listFolder("/images");

//Fetch Items
$items = $listFolderContents->getItems();

//All Items
$all = $items->all();

// Array to store image file names
$imgs = []; 

foreach ($all as $key => $value) {
    $imgs[] = $value->getDataProperty('path_lower');
}

sort($imgs);  // sorting by ascending name

$count = count($imgs);  // number of images

//var_dump($imgs); 

$links = [];

$alts = [];  // for img alt attribute

foreach ($imgs as $img) {
    $temporaryLink = $dropbox->getTemporaryLink($img);
    // Add Link to array
    $links[] = $temporaryLink->getLink();

    $alts[] = substr( rtrim($img, ".png"), strpos($img, "_") + 1); 	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap 4 Carousel</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
.carousel{
    background: #2f4357;
    margin-top: 20px;
}
.carousel-item{
    text-align: center;
    min-height: 280px; /* Prevent carousel from being distorted if for some reason image doesn't load */
}
.bs-example{
	margin: 20px;
}
img {
    margin-top: 20px;
  max-height:200px;
}

</style>
</head>
<body>
<div class="container">
  <h1>Bootstrap Carousel: images from Dropbox</h1>
  <h2>using Dropbox API v2</h2> 
  <p>References:</p>
  <ul>
    <li><a href="https://www.tutorialrepublic.com/twitter-bootstrap-tutorial/bootstrap-carousel.php">Bootstrap Carousel (tutorialrepublic.com)</a></li>
    <li><a href="https://github.com/kunalvarma05/dropbox-php-sdk">An unofficial PHP SDK to work with the Dropbox API v2 (GitHub)</a></li>
  </ul>

<!--
Bootstrap Carousel from
https://www.tutorialrepublic.com/twitter-bootstrap-tutorial/bootstrap-carousel.php 
-->
<div class="bs-example">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <?php 
           for ($i = 1; $i < $count; $i++) {
              echo "<li data-target='#myCarousel' data-slide-to='".$i."'></li>\n";
           } 
        ?>
        </ol>
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= $links[0] ?>" alt="<?= $alts[0] ?>">
            </div>
        <?php
           for ($i = 1; $i < $count; $i++) {    
              echo "<div class='carousel-item'>\n";
              echo "<img src='$links[$i]' alt='$alts[$i]'>\n";
               echo "</div>\n";
           }
        ?>
        </div>
        <!-- Carousel controls -->
        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
</div>

</div> <!-- container -->
</body>
</html>                                                        
