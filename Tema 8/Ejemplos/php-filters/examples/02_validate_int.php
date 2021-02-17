<!DOCTYPE html>
<!-- 
Validating and Sanitizing Data with Filters
https://www.tutorialrepublic.com/php-tutorial/php-filters.php
-->
<html lang="en">
<head>
    <title>Validate an Integer in PHP</title>
</head>
<body>

<?php
// Sample integer value
$int = 20;

// uncomment next line. The example code will display invalid integer message
// $int = 0;
// To fix this problem, you need to explicitly test for the value 0
// See 03_validate_int.php
 
echo "<p id='output'>";

// Validate sample integer value
if(filter_var($int, FILTER_VALIDATE_INT)){
    echo "The <b>$int</b> is a valid integer";
} else {
    echo "The <b>$int</b> is not a valid integer";
}
echo "</p>";
?> 

</body>
</html>                                    		
