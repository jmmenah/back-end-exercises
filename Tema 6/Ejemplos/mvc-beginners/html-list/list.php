<!DOCTYPE htm>
<html>
<body>
<ul>
    <?php
    // list.php (view)

    // 4 Steps Simple PHP MVC Example (What the Heck is MVC!?)
    // https://code-boxx.com/simple-php-mvc-example/

    /*
     * The view should be pretty self-explanatory.
     * It is nothing more than using HTML and CSS to display the data to the user.
     */

    require "database.php";
    require "users.php";

    $users = new Users();

    foreach ($users->get() as $u) {
        echo "<li>" . $u['name'] . "</li>";
    }
    ?>
</ul>
</body>
</html>
