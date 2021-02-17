<!DOCTYPE html>
<!-- 
Validating and Sanitizing Data with Filters
https://www.tutorialrepublic.com/php-tutorial/php-filters.php
-->
<html lang="en">
<head>
    <title>Validate a MAC address</title>
</head>
<body>

<?php
// Sample MAC address value
$mac = 'FA-F9-DD-B2-5E-0D';

echo "<p id='output'>";
 
// Validate sample MAC address value
if(filter_var($mac, FILTER_VALIDATE_MAC)){
    echo "The <b>$mac</b> is a valid MAC address";
} else {
    echo "The <b>$mac</b> is not a valid MAC address";
}
echo "</p>";
?>

</body>
</html>
