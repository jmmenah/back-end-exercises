<?php
/*
 * Immutable MVC: MVC In PHP 2019 Edition (Part 1)
 * by Tom Butler, 20 Feb 2019
 * https://r.je/immutable-mvc-in-php
 *
 * In this example, the model is mutable but the other components are not.
 *
 * Now there is no way to change the model's state once it's been instantiated.
 * Calling the setText method creates a new instance.
 * Any place that the original instance is referenced will not see a change in the state of the model.
 * The controller and view will need to be updated to use this updated model class.
 * Now that the model is immutable, we cannot rely on the view and controller sharing the same model instance.
 * Instead, the controller action will return a model instance which will then be passed to the view.
 */

class Model
{
    private $text;

    public function __construct($text = 'Hello World')
    {
        $this->text = $text;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        return new Model($text);
    }
}


class View
{
    public function output(Model $model)
    {
        return '<a href="mvc2.php?action=textclicked">' . $model->getText() . '</a>';
    }
}


class Controller
{
    public function textClicked(Model  $model)
    {
        return $model->setText('Text Clicked');
    }
}


$model = new Model();
$controller = new Controller();
$view = new View();

if (isset($_GET['action'])) {
    $model = $controller->{$_GET['action']}($model);
}

echo $view->output($model);

/*
 * Conclusion
 * This immutable implementation of MVC has some advantages over the mutable version:
 *  - State is better managed so that the application doesn't suffer from action at a distance where changing
 *    an object in one location (in the controller) then causes changes in a seemingly unrelated component (the view)
 *  - There is less state overall. There are no longer references to the different objects in multiple locations.
 *    The controller and view no longer have a reference to the model, they are given an instance to work with
 *    at the moment they need it, not before
 */