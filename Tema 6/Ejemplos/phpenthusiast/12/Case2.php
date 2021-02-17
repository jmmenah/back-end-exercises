<?php
/*
 * Learn Object-oriented PHP
 * Static methods and properties
 * https://phpenthusiast.com/object-oriented-php-tutorials/static-methods-and-properties
 */

/*
 * Use case 2: for utility classes
 * It is very common to use static methods for utility classes. The sole purpose of utility classes is
 * to provide services to the main classes. Utility methods can perform all kinds of tasks, such as:
 * conversion between measurement systems (kilograms to pounds), data encryption, sanitation, and
 * any other task that is not more than a service for the main classes in our application.
 *
 * The example given below is of a static method with the name of redirect
 * that redirects the user to the URL that we pass to it as an argument.
 */

class Utilis {
    // The method uses PHP's header function to redirect the user.
    static public function redirect($url)
    {
        header("Location: $url");
        exit;
    }
}

Utilis::redirect("http://www.phpenthusiast.com");