<?php
// http://free-web-services.com/tutorial.html

/*
Consume a SOAP web service:
The "add" service is described in http://free-web-services.com/add.wsdl
This is an XML document describing the transport methods, input and output messages and available operations. 
In this case only the "add" method is available. 

Soap is more complex. But when you use a development enviroment that offers out-of-the-box soap clients it is actually very simple. 
*/
 
$client = new SoapClient('http://free-web-services.com/add.wsdl');
 
try {
  $response = $client->add(array("a" => 13, "b" => 17));
  echo "sum = " . $response->sum . "\n";
  echo "time = " . $response->time . "\n";
} catch (SoapFault $fault) {
  echo "Error: " . $fault->faultcode . ": " . $fault->getMessage() . "\n";
}
?>
