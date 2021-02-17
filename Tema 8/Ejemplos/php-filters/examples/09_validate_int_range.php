<!DOCTYPE html>
<!-- 
Validating and Sanitizing Data with Filters
https://www.tutorialrepublic.com/php-tutorial/php-filters.php
-->
<html lang="en">
<head>
    <title>Validate an Integer Within a Range in PHP</title>
</head>
<body>

<?php
// Sample integer value
$int = 75;

echo "<p id='output'>";
 
// Validate sample integer value
if(filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_range" => 0,"max_range" => 100)))){
    echo "The <b>$int</b> is within the range of 0 to 100";
} else {
    echo "The <b>$int</b> is not within the range of 0 to 100";
}
echo "</p>";
?>

</body>
</html
