<?php
// http://free-web-services.com/tutorial.html

/*
HTTP POST is a way to consume a web service:
The service end point  http://free-web-services.com/add 
can be used to POST a JSON object. 
The result will be a new JSON object with two properties: 
sum (the actual sum) and time (the time needed to calculate the sum). 
*/
 
$obj = new StdClass();
$obj->a = 4;
$obj->b = 9;
 
//--- Use curl to do the HTTP-POST transport
$ch = curl_init();
 
curl_setopt($ch,CURLOPT_URL,'http://free-web-services.com/add');
curl_setopt($ch,CURLOPT_POST,   true);
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($obj));
 
//--- Execute
$result = curl_exec($ch);
 
//--- Get the HTTP result
$httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
 
//--- Close curl handle
curl_close($ch);
 
if ($httpStatus == 200) {
  //--- Success
  $resultObj = json_decode($result);
  echo "Sum = " . $resultObj->sum . "\n";
  echo "Time = " . $resultObj->time . "\n";
} else {
  //--- Error
  echo "Server returned error " . $httpStatus . ".\n";
} 
 
?>
