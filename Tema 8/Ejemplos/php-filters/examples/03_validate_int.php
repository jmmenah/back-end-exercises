<!DOCTYPE html>
<!-- 
Validating and Sanitizing Data with Filters
https://www.tutorialrepublic.com/php-tutorial/php-filters.php
-->
<html lang="en">
<head>
    <title>Validate Integers Including Zero in PHP</title>
</head>
<body>

<?php
// Sample integer value
$int = 0;

echo "<p id='output'>";

// Validate sample integer value
if(filter_var($int, FILTER_VALIDATE_INT) === 0 || filter_var($int, FILTER_VALIDATE_INT)){
    echo "The <b>$int</b> is a valid integer";
} else {
    echo "The <b>$int</b> is not a valid integer";
}
echo "</p>";
?>

</body>
</html>                                    		                                  		
