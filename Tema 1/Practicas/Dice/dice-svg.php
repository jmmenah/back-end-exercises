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
?>

<svg width="200" height="200" xmlns="http://www.w3.org/2000/svg">
 <!-- Created with SVG-edit - http://svg-edit.googlecode.com/ -->
 <g>
  <title>Layer 1</title>
  <rect fill="#aaffaa" stroke="#000000" stroke-width="10" x="5.5" y="3.5" width="190" height="190" id="svg_1"/>
  <text fill="#000000" stroke="#000000" stroke-width="0" stroke-dasharray="null" x="47.5" y="98.5" id="svg_2" font-size="24" font-family="serif" text-anchor="middle" xml:space="preserve" transform="matrix(10.7141, 0, 0, 5.86869, -407.421, -432.071)"><?= $roll ?></text>
 </g>
</svg>

<?php  
   } else {
     echo "<h2>Welcome to \"Roll the Dice\"</h2>\n";
   }
?>
  <form method="POST">
    <input type="submit" name="roll" value="Roll">
  </form>
</body>
</html>
