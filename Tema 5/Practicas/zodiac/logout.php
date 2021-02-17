<?php
    session_name("zodiac");
    session_start();
    session_destroy();
    header("Location: index.php");
?>
