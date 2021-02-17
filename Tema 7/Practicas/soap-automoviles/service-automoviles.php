<?php
/*
 * Servicio Web en PHP por Jose Hernández
 * https://josehernandez.es/2011/01/18/servicio-web-php.html
 */

include 'GestionAutomoviles.php';

$soap = new SoapServer(null, array('uri' => 'http://jmmenah.infinityfreeapp.com/soap-automoviles/'));
$soap->setClass('GestionAutomoviles');
$soap->handle();
?>
