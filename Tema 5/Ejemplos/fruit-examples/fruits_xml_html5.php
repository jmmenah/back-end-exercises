<?php
/**
 * PHP example to load an XML document using DOM
 *
 * IES Virgen del Carmen de Jaén
 * Desarrollo Web en Entorno Servidor 2º DAW
 * Rafael García Cabrera
 *
 * References:
 * http://php.net/manual/en/book.dom.php
 * http://www.w3schools.com/php/php_xml_dom.asp
 * http://www.chilkatsoft.com/data/fruitRecordsSort.xml
 */

include_once("fruits_functions.php");

pageTop("PHP example to load an XML document using DOM");

$xmlDoc = new DOMDocument();

// Load a xml document from URL
$xmlDoc->load("http://www.chilkatsoft.com/data/fruitRecordsSort.xml");

$name = $xmlDoc->getElementsByTagName('name');
$color = $xmlDoc->getElementsByTagName('color');

// Display a html table using the heredoc syntax
// http://php.net/manual/en/language.types.string.php#language.types.string.syntax.heredoc
echo <<<TABLE
<table>
  <tr>
    <th>fruit</th>
    <th>color</th>
  </tr>
TABLE;

// loop through all name and color elements
// the xml document has the same number of color tags as name tags
for ($i = 0; $i <= $name->length - 1; $i++) {
    echo "\n<tr>\n<td>" . $name->item($i)->nodeValue . "</td>\n";
    $c = $color->item($i)->nodeValue;
    echo "<td style=\"color:" . $c . ";\">" . $c . "</td>\n</tr>";
}
echo "\n</table>\n";

pageBottom();