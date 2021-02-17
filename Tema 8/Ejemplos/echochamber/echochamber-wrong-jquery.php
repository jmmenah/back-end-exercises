<?php
// example based on Post-Redirect-Get Pattern in PHP by Garren Hochstetler
// http://wordsideasandthings.blogspot.com/2013/04/post-redirect-get-pattern-in-php.html

if (isset($_POST['shout'])) {
    $echoedShout = $_POST['shout'];
    $line = $echoedShout . PHP_EOL;
    file_put_contents("test-wrong.txt", $line, FILE_APPEND);
} else $echoedShout = "";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Not using PRG Pattern (jQuery)</title>
    <style>
        pre {
            font-size: 2em;
            color: #00008B;
            background-color: #F0F8FF;
            width: 30%;
            border-style: dotted;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $.ajax({
                url: "test-wrong.txt", success: function (result) {
                    $("#file-content").html(result);
                }
            });
        });
    </script>
</head>

<body>
<h1>Not using PRG Pattern example (jQuery)</h1>

<?php echo "<h2>$echoedShout</h2>" ?>
<form action="echochamber-wrong-jquery.php" method="POST">
    <input type="text" name="shout" value=""/>
</form>
<pre id="file-content"></pre>

</body>
</html>
