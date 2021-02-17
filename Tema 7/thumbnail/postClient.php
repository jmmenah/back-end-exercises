<?php
//--- Set the parameters --------------//
$url    = "http://www.diariojaen.es/";
$apikey = "ab71790432baff84f666f457feb11db24f6fedf9d18e";
$width  = 640;
//--- Make the call -------------------//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.thumbnail.ws/api/' . $apikey . '/thumbnail/get');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, array(
    'url' => $url,
    'width' => $width,
    'fullpage' => 'false'
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$jpeg = curl_exec($ch);
curl_close($ch);
//--- Do something with the image -----//
/* file_put_contents("screenshot.jpg", $jpeg); */
header("Content-type: image/jpg");
echo $jpeg;
exit(0);
?>
