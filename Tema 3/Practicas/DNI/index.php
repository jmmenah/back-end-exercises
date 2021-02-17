<?php include "header.php"?>
<!DOCTYPE html>
<html lang="en">
<title>DNI Letter Calculator - <?= $title ?? '' ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<header class="w3-container w3-teal">
    <h1>DNI Letter Calculator - <?= $title ?? '' ?></h1>
</header>

<div class="w3-container">
    <p>The number of the National Identity Document consists of eight digits and an alphabetical control character.
        The letter is obtained from the complete number of the DNI divided by the number 23.
        The remainder of this division, which is between 0 and 22, gives the letter used for security.
        The letters I, Ñ, O, U are not used. The letters I and O are not used – to avoid confusions with the numbers 0 and 1.
        The Ñ is not used in order to avoid confusions with N.
    </p>
    <div class="w3-half w3-responsive">
        <table class="w3-table-all w3-card">
            <tbody><tr>
                <th class="w3-teal">Remainder
                </th>
                <td>0</td>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>13</td>
                <td>14</td>
                <td>15</td>
                <td>16</td>
                <td>17</td>
                <td>18</td>
                <td>19</td>
                <td>20</td>
                <td>21</td>
                <td>22
                </td></tr>
            <tr>
                <th class="w3-teal">Letter
                </th>
                <td>T</td>
                <td>R</td>
                <td>W</td>
                <td>A</td>
                <td>G</td>
                <td>M</td>
                <td>Y</td>
                <td>F</td>
                <td>P</td>
                <td>D</td>
                <td>X</td>
                <td>B</td>
                <td>N</td>
                <td>J</td>
                <td>Z</td>
                <td>S</td>
                <td>Q</td>
                <td>V</td>
                <td>H</td>
                <td>L</td>
                <td>C</td>
                <td>K</td>
                <td>E
                </td></tr></tbody></table>
    </div>
</div>
<div class="w3-row-padding w3-section">

    <div class="w3-half w3-xlarge w3-text-teal">
        <div class="w3-card">
            <div class="w3-container w3-margin-top">

                <form action="dni.php" method="get">
                    <p>Please, input the DNI number</p>

                    <p><strong>Number:</strong> <input type="number" name="dni" min="0" max="99999999" /></p>
                    <?php isset($_GET["dni"]) ? print $_GET["dni"] : ""; ?>
                    <p>
                        <input class="w3-button w3-round w3-teal w3-hover-green" type="submit" value="Calculate" />
                        <input class="w3-button w3-round w3-teal" type="reset" value="Reset" />
                    </p>
                </form>

            </div>
        </div>
    </div>

    <div class="w3-half">
        <div class="w3-card w3-center">
            <img src="DNI Letter Calculator_files/285px-Documento_Nacional_de_Identidad_(Spain).jpg" alt="DNI" class="w3-margin-top">

            <p>Spanish identity card (Documento nacional de identidad).<br />
                Sample from Wikipedia <a href="https://en.wikipedia.org/wiki/Documento_Nacional_de_Identidad_(Spain)">Documento Nacional de Identidad (Spain)</a></p>

        </div>
    </div>

</div>
</body>
<footer class="w3-container w3-teal">
    <h5>DAW 2</h5>
    <p>
        <?php include 'footer.php'; ?>
    </p>
</footer>
</html>