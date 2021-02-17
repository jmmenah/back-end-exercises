<?php
// The ReflectionClass class reports information about a class. 
// https://www.php.net/manual/en/class.reflectionclass.php#class.reflectionclass

include "Calculator.php";

echo "<pre>";

$r = new ReflectionClass(new Calculator);

print_r($r->getProperties());

print_r($r->getMethods());

echo "</pre>";
