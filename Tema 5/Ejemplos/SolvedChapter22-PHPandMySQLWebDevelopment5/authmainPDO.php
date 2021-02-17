<?php
session_start();

if (isset($_POST['userid']) && isset($_POST['password'])) {
    // if the user has just tried to log in
    $userid = htmlentities($_POST['userid']);
    $password = $_POST['password'];

    try {
        $db_conn = new PDO('mysql:host=localhost; dbname=auth', 'webauth', 'webauth');
        $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "select * from authorized_users where 
            name=:userid and 
            password=sha1(:pass)";

        $stmt = $db_conn->prepare($query);
        $stmt->execute(
            array(":userid" => $userid,
                ":pass" => $password
            )
        );

        if ($stmt->rowCount()) {
            // if they are in the database register the user id
            $_SESSION['valid_user'] = $userid;
        }

    } catch (PDOException $e) {
        echo 'Connection to database failed: ' . $e->getMessage();
        exit();
    }

    $db_conn = null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home Page (PDO)</title>
    <style>
        fieldset {
            width: 50%;
            border: 2px solid #ff0000;
        }

        legend {
            font-weight: bold;
            font-size: 125%;
        }

        label {
            width: 125px;
            float: left;
            text-align: left;
            font-weight: bold;
        }

        input {
            border: 1px solid #000;
            padding: 3px;
        }

        button {
            margin-top: 12px;
        }
    </style>
</head>
<body>
<h1>Home Page (PDO)</h1>
<?php
if (isset($_SESSION['valid_user'])) {
    echo '<p>You are logged in as: ' . $_SESSION['valid_user'] . ' <br />';
    echo '<a href="logoutPDO.php">Log out</a></p>';
} else {
    if (isset($userid)) {
        // if they've tried and failed to log in
        echo '<p>Could not log you in.</p>';
    } else {
        // they have not tried to log in yet or have logged out
        echo '<p>You are not logged in.</p>';
    }

    // provide form to log in
    echo '<form action="authmainPDO.php" method="post">';
    echo '<fieldset>';
    echo '<legend>Login Now!</legend>';
    echo '<p><label for="userid">UserID:</label>';
    echo '<input type="text" name="userid" id="userid" size="30"/></p>';
    echo '<p><label for="password">Password:</label>';
    echo '<input type="password" name="password" id="password" size="30"/></p>';
    echo '</fieldset>';
    echo '<button type="submit" name="login">Login</button>';
    echo '</form>';

}
?>
<p><a href="members_onlyPDO.php">Go to Members Section</a></p>

</body>
</html>
