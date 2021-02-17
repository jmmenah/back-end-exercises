<!DOCTYPE html>
<!--
https://www.w3schools.com/tags/tryit.asp?filename=tryhtml5_input_type_hidden 
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Form with hidden input field</title>
</head>
<body>

<h1>Define a hidden input field:</h1>

<form action="/action_page.php">
  First name: <input type="text" name="fname"><br>
  <input type="hidden" id="custId" name="custId" value="3487">
  <input type="submit" value="Submit">
</form>

<p>Notice that the hidden input field is not shown to the user, but the data is sent when the form is submitted.</p>

</body>
</html>

