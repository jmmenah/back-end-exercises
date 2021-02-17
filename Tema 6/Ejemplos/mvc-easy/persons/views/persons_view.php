<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Persons</title>
</head>
<body>
<?php
foreach ($data as $d) {
    echo $d["id"]. ".- " . $d["first_name"]. " ". $d["last_name"] . "<br/>";
}
?>
</body>
</html>