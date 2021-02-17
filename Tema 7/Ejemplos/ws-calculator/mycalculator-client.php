<?php
// Just in case removes manually the cached wsdl file 
// See phpinfo soap.wsdl_cache_dir

ini_set('soap.wsdl_cache',0);
ini_set('soap.wsdl_cache_enabled',0);
ini_set('soap.wsdl_cache_ttl',0);

$client = new SoapClient('http://localhost/ws-calculator/calculator.wsdl', 
                         array('soap_version' => SOAP_1_2,
                               'trace' => 1,
                               'exceptions' => true,
                               'cache_wsdl' => WSDL_CACHE_NONE ) 
          );

//$client = new SoapClient('http://www.dneonline.com/calculator.asmx?WSDL');

/*
echo "<pre>";
var_dump($client->__getFunctions());
echo "</pre>";
*/

try {

    $parameters = array('intA' => "1", 'intB' => "2");

    $response = $client->Add($parameters);
    echo "<p>sum = " . $response->AddResult . "</p>\n";

    $response = $client->Subtract($parameters);
    echo "<p>sub = " . $response->SubtractResult . "<p>\n";

    $test = new stdClass();
    $test->intA = 3;
    $test->intB = 4;

    $response = $client->Multiply($test);
    echo "<p>mul = " . $response->MultiplyResult . "</p>\n";

    $response = $client->Divide(array('intA' => 19, 'intB' => 3));
    echo "<p>div = " . $response->DivideResult . "</p>\n";

} catch (SoapFault $fault) {
  echo "Error: " . $fault->faultcode . ": " . $fault->getMessage() . "\n";
}

