<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['prg'])) {
        file_put_contents("test-prg.txt", "");
    }
    if (isset($_POST['wrong'])) {
        file_put_contents("test-wrong.txt", "");
    }

    header("HTTP/1.1 303 See Other");
    header('Location: ' . $_SERVER['PHP_SELF']);
    return;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post-Redirect-Get Pattern example</title>
</head>
<body>
<h1>Post-Redirect-Get Pattern example</h1>
<h2>Example based on
    <a href="http://wordsideasandthings.blogspot.com/2013/04/post-redirect-get-pattern-in-php.html">
        Post-Redirect-Get Pattern in PHP
    </a>
    by Garren Hochstetler
</h2>
<ol>
    <li><a href="echochamber-wrong.php" title="Not using PRG Pattern">echochamber-wrong.php</a></li>
    <li><a href="echochamber-prg.php" title="Post-Redirect-Get Pattern Demonstration">echochamber-prg.php</a></li>
    <li><a href="echochamber-wrong-jquery.php" title="Not using PRG Pattern (jQuery)">echochamber-wrong-jquery.php</a>
    </li>
    <li><a href="echochamber-prg-jquery.php" title="Post-Redirect-Get Pattern Demonstration (jQuery)">echochamber-prg-jquery.php</a>
    </li>
</ol>
<form method="post">
    <input type="submit" name="prg" value="Delete test-prg.txt content">
    <input type="submit" name="wrong" value="Delete test-wrong.txt content">
</form>
</body>
</html>
