<?php
$length = 8;
$count = 2;
$characters = 'lower_case,upper_case,numbers,special_symbols';
$post = [
    "length" => $length,
    "count" => $count,
    "characters" => $characters,
];

$ch = curl_init('http://localhost/passgen/service.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

// execute!
$passwords = curl_exec($ch);
// close the connection, release resources used
curl_close($ch);
print $passwords;