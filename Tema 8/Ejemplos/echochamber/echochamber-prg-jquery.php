<?php
// example based on Post-Redirect-Get Pattern in PHP by Garren Hochstetler
// http://wordsideasandthings.blogspot.com/2013/04/post-redirect-get-pattern-in-php.html
session_start();

$echoedShout = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['shout'] = $_POST['shout'];

    header("HTTP/1.1 303 See Other");
    $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header("Location: $url");
    die();
} else if (isset($_SESSION['shout'])) {
    $echoedShout = $_SESSION['shout'];

    /*
        Put database-affecting code here.
        In this case using a text file
    */
    $line = $echoedShout . PHP_EOL;
    file_put_contents("test-prg.txt", $line, FILE_APPEND);

    session_unset();
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PRG Pattern Demonstration (jQuery)</title>
    <style>
        pre {
            font-size: 2em;
            color: #00008B;
            background-color: #F0F8FF;
            width: 30%;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $.ajax({
                url: "test-prg.txt", success: function (result) {
                    $("#file-content").html(result);
                }
            });
        });
    </script>

</head>
<body>
<h1>Post-Redirect-Get Pattern Demonstration (jQuery)</h1>
<?php echo "<h2>$echoedShout</h2>" ?>
<form action="echochamber-prg-jquery.php" method="POST">
    <input type="text" name="shout" value=""/>
</form>
<pre id="file-content"></pre>
</body>
</html>
