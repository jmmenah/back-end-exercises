<!DOCTYPE html>
<!-- 
Validating and Sanitizing Data with Filters
https://www.tutorialrepublic.com/php-tutorial/php-filters.php
-->
<html lang="en">
<head>
    <title>Validate a URL for Query String in PHP</title>
</head>
<body>

<?php
// Sample website url
$url = "http://www.example.com?topic=filters";

echo "<p id='output'>";
 
// Validate website url for query string
if(filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED)){
    echo "The <b>$url</b> contains query string";
} else{
    echo "The <b>$url</b> does not contain query string";
}
echo "</p>";
?>

</body>
</html>
