<?php
// The MVC Pattern and PHP, Part 1
// https://www.sitepoint.com/the-mvc-pattern-and-php-1/

include 'models/model_01.php';
include 'views/view_01.php';
include 'controllers/controller_01.php';

$model = new Model();
$controller = new Controller($model);
$view = new View($controller, $model);
echo $view->output();
