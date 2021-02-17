<?php
require_once 'Calculator.php';
try {

//$soap = new SoapServer('http://localhost/ws-calculator/mycalculator.wsdl');

    $soap = new SoapServer('http://localhost/ws-calculator/calculator.wsdl', array('soap_version' => SOAP_1_2));  

    $soap->setClass('Calculator');  

    $soap->handle();

} catch (SoapFault $f){
    echo 'SoapFault exception: ',  $f->getMessage(), "\n";
} catch (Exception $e){
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}



