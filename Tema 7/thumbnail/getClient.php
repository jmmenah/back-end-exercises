<?php
//--- Get all websites we want screenshots for -----
include_once('data.php');
//--- Set the parameters --------------//
$apikey = "ab71790432baff84f666f457feb11db24f6fedf9d18e";
$width   = 380;
//--- Loop through all websites --------------------
foreach ($websites as $website) {
    echo "Getting screenshot for " . $website['name'] . "<br>";

    //--- Make the call -------------------//
    $fetchUrl = "https://api.thumbnail.ws/api/".$apikey ."/thumbnail/get?url=".
        urlencode($website['url'])."&width=". urlencode($width);

    $image = file_get_contents($fetchUrl);
    //--- Save image to disk
    file_put_contents(dirname(__FILE__) . '/screenshot' . $website['id'] . '.jpg', $image);
}
