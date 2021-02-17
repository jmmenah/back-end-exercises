<!DOCTYPE html>
<!-- 
Validating and Sanitizing Data with Filters
https://www.tutorialrepublic.com/php-tutorial/php-filters.php
-->
<html lang="en">
<head>
    <title>Validate IPV6 Addresses in PHP</title>
</head>
<body>

<?php
// Sample IP address
$ip = "172.16.254.1";

// IP V6
// https://en.wikipedia.org/wiki/IPv6
// $ip = "2001:0db8:0000:0000:0000:ff00:0042:8329";
// $ip = "2001:0db8:0:0:0:ff00:0042:8329";
// $ip = "2001:0db8::ff00:0042:8329";

echo "<p id='output'>";
 
// Validate sample IP address. Try FILTER_FLAG_IPV4
if(filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)){
    echo "The <b>$ip</b> is a valid IPV6 address";
} else {
    echo "The <b>$ip</b> is not a valid IPV6 address";
}
echo "</p>";
?>

</body>
</html>
