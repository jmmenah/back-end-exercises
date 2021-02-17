<?php
/*
 * Immutable MVC: MVC In PHP 2019 Edition (Part 1)
 * by Tom Butler, 20 Feb 2019
 * https://r.je/immutable-mvc-in-php
 *
 * This version of the architecture relies on the model being mutable.
 * Both the controller and the view share a reference to the same model instance.
 * The controller updates the model and the view reads the model's state to produce the output.
 * The controller would amend the model's state and the view would read the state of the model instance.
 */
class Model
{
    public $text;

    public function __construct()
    {

        $this->text = 'Hello world!';
    }
}


class View
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function output()
    {
        return '<a href="mvc.php?action=textclicked">' . $this->model->text . '</a>';
    }
}


class Controller
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function textClicked()
    {
        $this->model->text = 'Text Updated';
    }
}


$model = new Model();

//It is important that the controller and the view share the model

$controller = new Controller($model);

$view = new View($model);

if (isset($_GET['action'])) $controller->{$_GET['action']}();

echo $view->output();

