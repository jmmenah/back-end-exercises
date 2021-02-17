<?php
// The MVC Pattern and PHP, Part 1
// https://www.sitepoint.com/the-mvc-pattern-and-php-1/

include 'models/model_02.php';
include 'views/view_02.php';
include 'controllers/controller_02.php';

$model = new Model();
$controller = new Controller($model);
$view = new View($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
    $controller->{$_GET['action']}();
}

echo $view->output();

