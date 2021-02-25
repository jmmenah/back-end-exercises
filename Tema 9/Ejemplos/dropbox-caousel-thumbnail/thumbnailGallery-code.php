<?php
require_once __DIR__ . '/vendor/autoload.php';

use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;

// Get your Tokens from Dropbox and update the three next variables
$authorizationToken = "";

$client_id = "";

$client_secret = "";

//Configure Dropbox Application
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

sort($imgs);

$count = count($imgs);  // number of images

//Available sizes: 'thumb', 'small', 'medium', 'large', 'huge'
$size = 'medium';

//Available formats: 'jpeg', 'png'
$format = 'png'; //Default format

$thumbs = [];

$alts = [];  // for img alt attribute

foreach ($imgs as $img) {
    $file = $dropbox->getThumbnail($img, $size, $format);

    // Get File Contents
    $contents = $file->getContents();

    // image content, convert to base64 encoding
    $imageData = base64_encode($contents);

    // Format the image SRC:  data:{mime};base64,{data};
    $src = 'data:image/png;base64,' . $imageData;
    // Add to array
    $thumbs[] = $src;
    $alts[] = substr( rtrim($img, ".png"), strpos($img, "_") + 1); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!--
     https://startbootstrap.com/snippets/thumbnail-gallery/
-->
  <title>Bootstrap Thumbnail Gallery</title>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">
  <meta name="viewport" content="width=device-width, initial-scale=1">

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

 </head>
<body>
<!-- Page Content -->
<div class="container">

  <h1>Bootstrap Thumbnail Gallery: images from Dropbox</h1>
  <h2>using Dropbox API v2</h2> 
  <p>References:</p>
  <ul>
    <li><a href="https://startbootstrap.com/snippets/thumbnail-gallery/">Bootstrap Thumbnail Gallery (startbootstrap.com)</a></li>
    <li><a href="https://github.com/kunalvarma05/dropbox-php-sdk">An unofficial PHP SDK to work with the Dropbox API v2 (GitHub)</a></li>
  </ul>

  <div>
  <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Thumbnail Gallery</h1>

  <hr class="mt-2 mb-5">

  <div class="row text-center text-lg-left">
    <?php
        for ($i = 0; $i < $count; $i++) {
            echo "<div class='col-lg-3 col-md-4 col-6'>\n";
            echo "  <a href='#' class='d-block mb-4 h-100'>\n";
            echo "    <img class='img-fluid img-thumbnail' src='$thumbs[$i]' alt='$alts[$i]'>\n";
            echo "  </a>\n";
            echo "</div>\n";
        } 
    ?>
  </div>
  </div>
</div>
<!-- /.container -->
</body>
</html>

