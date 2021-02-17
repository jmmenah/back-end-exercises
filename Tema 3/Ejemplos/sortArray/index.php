<?php
/*
   Modified from:
   https://www.mclibre.org/consultar/php/ejercicios/con-formularios/matrices-1/matrices-1-3-1.php
   original by Bartolomé Sintes Marco
*/

// https://www.mclibre.org/consultar/php/lecciones/php-recogida-datos.html
function getParameter($var, $m = "")
{
    if (!isset($_REQUEST[$var])) {
        $tmp = (is_array($m)) ? [] : "";
    } elseif (!is_array($_REQUEST[$var])) {
        $tmp = trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"));
    } else {
        $tmp = $_REQUEST[$var];
        array_walk_recursive($tmp, function (&$valor) {
            $valor = trim(htmlspecialchars($valor, ENT_QUOTES, "UTF-8"));
        });
    }
    return $tmp;
}

// Retrieve the parameters
$minNumber = getParameter("minNumber");
$maxNumber = getParameter("maxNumber");
$minValue = getParameter("minValue");
$maxValue = getParameter("maxValue");
$order = getParameter("order");

function checkInputs()
{
    global $minNumber, $maxNumber, $minValue, $maxValue, $order;
    if ($minNumber == "" || $maxNumber == "" || $minValue == "" || $maxValue == "") {
        $message = "Please, fill in all values.";
    } elseif (!is_numeric($minNumber) || !is_numeric($maxNumber) || !is_numeric($minValue) || !is_numeric($maxValue)) {
        $message = "All values must be numeric.";
    } elseif (!ctype_digit($minNumber) || !ctype_digit($maxNumber) || !ctype_digit($minValue) || !ctype_digit($maxValue)) {
        $message = "All values must be integer.";
    } elseif ($minNumber < 1 || $maxNumber < 1 || $minValue < 0 || $maxValue < 0 || $minNumber > 10 || $maxNumber > 20) {
        $message = "Some value is out of range";
    } elseif ($order != "" && $order != "asc" && $order != "desc") {
        $message = "The order is not correct";
    } else {
        $message = "";
    }
    return $message;
}

function printArray($a)
{
    print "<pre>\n";
    print_r($a);
    print "</pre>\n";
}

function displayOutput()
{
    $msg = checkInputs();
    if ($msg != "") {
        echo "<h2 class='error'>" . $msg . "</h2>";
    } else {
        global $minNumber, $maxNumber, $minValue, $maxValue, $order;
        $count = rand($minNumber, $maxNumber);
        print "<h2>Initial data</h2>\n";
        print "<p>Number of array values: <strong>$count</strong></p>\n";
        print "<p>Randomly chosen values between <strong>$minValue and $maxValue</strong></p>\n";

        $array = [];  // create initial array
        for ($i = 0; $i < $count; $i++) {
            $array[] = rand($minValue, $maxValue);
        }

        print "<h2>Initial Array</h2>\n";
        printArray($array);

        // sorting the array
        if ($order == "asc") {
            asort($array);
            print "<h2>Ordered Array (Ascending)</h2>\n";
            printArray($array);
        } elseif ($order == "desc") {
            arsort($array);
            print "<h2>Ordered Array (Descending)</h2>\n";
            printArray($array);
        } else {
            print "<h2>Ordered Array</h2>\n";
            print "<p>Ordering the array has not been requested</p>\n";
        }
    }
    print '<p></p><a class="button button-primary" href="">Return to form</a></p>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- http://getskeleton.com/
        A dead simple, responsive boilerplate.
    -->
    <!-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title>Sorting Array</title>
    <meta name="description" content="Sort an array of random integers">

    <meta name="author" content="Rafael García">

    <!-- Mobile Specific Metas
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONT
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

    <!-- CSS
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">

    <!-- Favicon
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="icon" type="image/png" href="images/favicon.png">
    <style>
        .error {
            color: red;
        }
    </style>

</head>
<body>

<div class="container">
    <div class="row" style="margin-top: 5%">
        <div class="twelve columns">
            <h1>Sort an array of random integers</h1>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                displayOutput();
            } else {
                ?>
                <!--
                      https://html.form.guide/php-form/php-form-action-self/
                      Remove htmlentities and try adding to the url the next string
                      /"><script>alert('xss')</script><foo"
                -->
                <form method="post" action="<?= htmlentities($_SERVER['PHP_SELF']) ?>">
                    <label for="minNumber">Minimum number of values:</label>
                    <input type="number" name="minNumber" min="1" max="10" value="10" id="minNumber">

                    <label for="maxNumber">Maximum number of values:</label>
                    <input type="number" name="maxNumber" min="1" max="20" value="20" id="maxNumber">

                    <label for="minValue">Minimum value:</label>
                    <input type="number" name="minValue" min="0" value="0" id="minValue">

                    <label for="maxValue">Maximum value:</label>
                    <input type="number" name="maxValue" min="0" value="100" id="maxValue">
                    <fieldset>
                        <legend>Sort order</legend>
                        <label><input type="radio" name="order" value="asc"> Ascending</label>
                        <label><input type="radio" name="order" value="desc"> Descending</label>
                    </fieldset>
                    <input class="button-primary" type="submit" value="Show">
                    <input class="button" type="reset" value="Reset">
                </form>
                <?php
            }
            ?>
        </div>
    </div>
</div>

</body>
</html>
