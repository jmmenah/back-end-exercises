<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejemplo JSON Autonomías</title>
</head>
<body>
<h1>Ejemplo JSON Autonomías</h1>
<?php
$autonomias = json_decode(file_get_contents("autonomias.json"));
// resultado de la decodificación:
echo "<pre>\n";
//print_r($autonomias);
echo "</pre>\n";
echo "<ul>\n";
foreach ($autonomias as $autonomia) {
    echo "  <li>$autonomia->nombre ($autonomia->autonomia_id)</li>\n";
}
echo "</ul>\n";
?>

</body>
</html>
