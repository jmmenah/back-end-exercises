<?php

function var_args() {
  echo 'Number of parameters:';
  // func_num_args — Returns the number of arguments passed to the function
  // https://www.php.net/manual/en/function.func-num-args.php
  echo func_num_args();

  echo '<br />';

  // func_get_args — Returns an array comprising a function's argument list
  // https://www.php.net/manual/en/function.func-get-args.php
  $args = func_get_args();
  foreach ($args as $arg) {
    echo $arg.'<br />';
  }
}

var_args(1,2,3);

var_args('hello', 47.3);

?>
