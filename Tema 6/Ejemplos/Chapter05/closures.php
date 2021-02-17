<?php
// Anonymous function
$printer =  function($value){ echo "$value <br/>"; };

$products = [ 'Tires' => 100, 
              'Oil' => 10,
              'Spark Plugs' => 4 ]; 

$markup = 0.20; // percentage

// Anonymous function
// increase $val with $markup percentage
$apply = function(&$val) use ($markup) {
           $val = $val * (1+$markup);
         };

// array_walk — Apply a user supplied function to every member of an array
// https://www.php.net/manual/en/function.array-walk.php
array_walk($products, $apply);

array_walk($products, $printer);

?>
