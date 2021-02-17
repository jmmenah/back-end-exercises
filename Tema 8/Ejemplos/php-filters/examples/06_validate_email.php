<!DOCTYPE html>
<!-- 
Validating and Sanitizing Data with Filters
https://www.tutorialrepublic.com/php-tutorial/php-filters.php
-->
<html lang="en">
<head>
    <title>Sanitize and Validate an Email Address in PHP</title>
</head>
<body>

<?php
// Sample email address
$email = "someone@@example.com";
 
// Remove all illegal characters from email
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

echo "<p id='output'>";
 
// Validate e-mail address
if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "The <b>$email</b> is a valid email address";
} else{
    echo "The <b>$email</b> is not a valid email address";
}
echo "</p>";
?>

</body>
</html>
