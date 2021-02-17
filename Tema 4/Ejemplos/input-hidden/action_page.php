<!DOCTYPE html>
<!--
https://www.w3schools.com/tags/tryit.asp?filename=tryhtml5_input_type_hidden 
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Forms action page</title>
</head>
<body>
<h1>Submitted Form Data</h1>
<h2>Your input was received as: (look at the url)</h2>
<code>
<?php
$url = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
echo $url;
?>
</code>

<p>
Welcome <strong><?= $_GET["fname"]; ?></strong>
</p>
<p>
Your custId is: <strong><?= $_GET["custId"]; ?></strong>
</p>

<p>The server has processed your input and returned this answer.</p>

</body>
</html>
