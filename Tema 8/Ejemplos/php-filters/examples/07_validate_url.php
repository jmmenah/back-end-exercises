<!DOCTYPE html>
<!-- 
Validating and Sanitizing Data with Filters
https://www.tutorialrepublic.com/php-tutorial/php-filters.php
-->
<html lang="en">
<head>
    <title>Sanitize and Validate a URL in PHP</title>
</head>
<body>

<?php
// Sample website url
$url = "http:://www.example.com";
 
// Remove all illegal characters from url
$url = filter_var($url, FILTER_SANITIZE_URL);

echo "<p id='output'>";
 
// Validate website url
if(filter_var($url, FILTER_VALIDATE_URL)){
    echo "The <b>$url</b> is a valid website url";
} else{
    echo "The <b>$url</b> is not a valid website url";
}
echo "</p>";
?>

</body>
</html>
