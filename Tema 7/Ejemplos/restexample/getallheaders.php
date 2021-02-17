<?php
// getallheaders — Fetch all HTTP request headers
// https://www.php.net/manual/en/function.getallheaders.php

foreach (getallheaders() as $nombre => $valor) {
    echo "$nombre: $valor\n";
}

