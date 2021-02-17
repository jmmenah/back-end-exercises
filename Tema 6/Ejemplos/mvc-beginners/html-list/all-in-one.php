<?php
// 4 Steps Simple PHP MVC Example (What the Heck is MVC!?)
// https://code-boxx.com/simple-php-mvc-example/

/*
 * THE “WRONG” WAY
 * So what is the “not MVC” way to do it in PHP then? Putting everything into a single script.
 *
 * There is absolutely nothing wrong with putting everything into a single script. 
 * But if you think of it "in MVC terms", the database (model), the retrieval of data (controller), 
 * and display of data (view) are all in one script. That is not what we want in MVC,  
 * and we should seek to have a clear-cut separation of concern, individual scripts 
 * that deal with each component. I.E. One for the model, one for the controller, and one for the view.
 */

// CONNECT TO DATABASE
$pdo = new PDO(
    "mysql:host=localhost;dbname=test;charset=utf8",
    "root", "root", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]
);

// GET ALL USERS
$stmt = $pdo->query('SELECT * FROM `users`');

// OUTPUT HTML ?>
<!DOCTYPE htm>
<html>
<body>
<ul><?php
    while ($row = $stmt->fetch()) {
        echo "<li>" . $row['name'] . "</li>";
    }
    ?></ul>
</body>
</html>
<?php
// COLOSE CONNECTION
$stmt = null;
$pdo = null;
?>
