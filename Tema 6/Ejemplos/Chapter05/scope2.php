<?php
function fn() {
  // https://www.php.net/manual/en/language.variables.scope.php#language.variables.scope.global
  global $var;
  $var = 'contents';
  echo 'inside the function, $var = '.$var.'<br />';
}

fn();
echo 'outside the function, $var = '.$var;
?>
