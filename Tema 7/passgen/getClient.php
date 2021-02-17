<?php
$length=8;
$count=2;
$characters='lower_case,upper_case,numbers,special_symbols';
$consulta = http_build_query(["length" => $length, "count" => $count, "characters" => $characters]);
$passwords = file_get_contents("http://localhost/passgen/service.php?".$consulta);
print $passwords;