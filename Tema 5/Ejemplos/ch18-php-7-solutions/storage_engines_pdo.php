<?php
// edit the first three lines to match your remote server setup
$host = 'localhost';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host", $username, $password);
    $sql = 'SHOW ENGINES';
    $result = $conn->query($sql);
    if (!$result) {
        $error = $conn->errorInfo()[2];
    }
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Check Storage Engines</title>
</head>

<body>
<?php if (isset($error)) {
    echo "<p>$error</p>";
} else { ?>
    <table>
        <tr>
            <th>Storage Engine</th><th>Supported</th>
        </tr>
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?= $row['Engine']; ?></td><td><?= $row['Support']; ?></td>
            </tr>
        <?php } ?>
    </table>
<?php }?>
</body>
</html>
