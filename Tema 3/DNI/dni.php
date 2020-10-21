<?php include "header.php"?>
<!DOCTYPE html>
<html lang="en">
<title>DNI Letter - <?= $title ?? '' ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<header class="w3-container w3-teal">
    <h1>DNI Letter - <?= $title ?? '' ?></h1>
</header>
<div class="w3-row-padding w3-section">

    <div class="w3-half w3-xlarge w3-text-teal">
        <div class="w3-card">
            <div class="w3-container w3-margin-top">
                <?php
                $dni=$_GET["dni"];
                function letra_nif($dni) {
                    return substr("TRWAGMYFPDXBNJZSQVHLCKE",strtr($dni,"XYZ","012")%23,1);
                }
                try {
                    if (ceil(log10((int)$dni)) == 8) {
                        $letra = letra_nif($dni);
                        print '<pre></pre><p class="w3-panel w3-green w3-round-xlarge">DNI number: <strong>';
                        print $dni;
                        print '</strong><br/>
                    DNI letter: <strong>';
                        print $letra;
                        print '</strong>
                </p>
                <div class="w3-half w3-green w3-hover-shadow w3-center w3-wide">
                    <h2 class="" style="text-shadow:1px 1px 0 #444">';
                        print $dni . $letra;
                        print '</h2>
                </div>


                <div class="w3-center w3-margin-bottom">

                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="285px" height="180px"
                         viewBox="0 0 285 180" enable-background="new 0 0 285 180" xml:space="preserve">
                        <image  id="image0" width="285" height="180" x="0" y="0"
                                xlink:href="DNI Letter Calculator_files/285px-Documento_Nacional_de_Identidad_(Spain).jpg"/>
                        <!-- DNI number -->
                        <rect x="25" y="155" width="90" height="20" stroke="red" stroke-width="1" fill="yellow"/>
                        <text x="70" y="170" text-anchor="middle" font-size="15" fill="black">';
                        print $dni . $letra;
                        print '</text>
                        </svg>
                </div></pre>';
                    } elseif ($dni == "") {
                        throw new Exception(print '<div class="w3-panel w3-red">
                            <h3>Error</h3>
                            <p>Warning: dni parameter is empty!</p>
                        </div>');
                    } elseif (is_integer($dni)) {
                        throw new Exception(print '<div class="w3-panel w3-red">
                            <h3>Error</h3>
                            <p>Warning: dni must be an integer!</p>
                        </div>');
                    } elseif (ceil(log10((int)$dni)) < 8) {

                        throw new Exception(print'<div class="w3-panel w3-red">
                            <h3>Error</h3>
                            <p>Warning: dni must have 8 digits!</p>
                        </div>');
                    } else {
                        throw new Exception(print '<div class="w3-panel w3-red">
                            <h3>Error</h3>
                            <p>Missing dni parameter!</p>
                        </div>');
                    }
                }catch (Exception $e){
                    $e->getMessage();
                }
                ?>
                <p>
                    <a href="index.php" class="w3-button w3-round w3-teal w3-hover-green">Return to DNI
                        Calculator</a>
                </p>
            </div>
        </div>
    </div>

</div>
<footer class="w3-container w3-teal">
    <h5>DAW 2</h5>
    <p>
        <?php include 'footer.php'; ?>
    </p>
</footer>
</html>