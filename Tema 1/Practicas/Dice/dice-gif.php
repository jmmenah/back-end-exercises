<!DOCTYPE html>
<html lang="en">
<head>
  <title>Roll a Dice</title>
</head>
<body>
  <h1>Roll a Dice</h1>
<?php
   if(isset($_POST['roll'])) {
     $roll = rand(1,6);
     echo "<img src=\"/handrollingdice/$roll.gif\" alt=\"dice\">\n";
   } else {
     echo "<h2>Welcome to \"Roll the Dice\"</h2>\n";
   }
?>
  <form method="POST">
    <input type="submit" name="roll" value="Roll">
  </form>
</body>
</html>
