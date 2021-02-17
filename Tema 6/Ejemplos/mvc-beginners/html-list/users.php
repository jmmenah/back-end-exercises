<?php
// users.php (controller)

// 4 Steps Simple PHP MVC Example (What the Heck is MVC!?)
// https://code-boxx.com/simple-php-mvc-example/

/*
 * The controller is a "middleman" that bridges the user input and model. 
 * Which in this case, will be a users class that fetches data from the database, 
 * and passes it back to the view for display to the user.	
 */

class Users extends DB
{
    function get()
    {
        return $this->select("SELECT * FROM `users`");
    }
}

?>
