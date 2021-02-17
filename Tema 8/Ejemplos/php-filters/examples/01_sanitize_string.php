<!DOCTYPE html>
<!-- 
Validating and Sanitizing Data with Filters
https://www.tutorialrepublic.com/php-tutorial/php-filters.php
-->
<html lang="en">
<head>
    <title>Sanitize a String in PHP</title>
</head>
<body>

<?php
// Sample user comment
$comment = "<h1>Hey there! How are you doing today?</h1>";
 
// Sanitize and print comment string
$sanitizedComment = filter_var($comment, FILTER_SANITIZE_STRING);
echo "<p id='output'>";
echo $sanitizedComment;
echo "</p>";
?>

</body>
</html>                                    		
