<!DOCTYPE html>
<html lang="en">
<head>
  <title>Roll a Dice</title>
</head>
<body>
  <h1>Random Symbol</h1>
<?php
   if(isset($_POST['roll'])) {
     $roll = rand(9728,9983);
     echo "<span style='font-size:100px;'>&#$roll;</span>\n";
   } else {
     echo "<h2>Welcome to \"Random Symbol\"</h2>\n";
   }
?>
  <form method="POST">
    <input type="submit" name="roll" value="Roll">
  </form>
</body>
</html>
