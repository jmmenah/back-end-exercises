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
    <title>Not using PRG Pattern</title>
    <style>
        pre {
            font-size: 2em;
            color: #00008B;
            background-color: #F0F8FF;
            width: 30%;
            border-style: dotted;
        }
    </style>

    <script>
        fetch('test-wrong.txt')
            .then((response) => {
                return response.text();
            })
            .then((data) => {
                document.getElementById('file-content').innerHTML = data;
            });
    </script>
</head>

<body>
<h1>Not using PRG Pattern example</h1>

<?php echo "<h2>$echoedShout</h2>" ?>
<form action="echochamber-wrong.php" method="POST">
    <input type="text" name="shout" value=""/>
</form>
<pre id="file-content"></pre>

</body>
</html>
