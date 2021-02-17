<?php
// http://free-web-services.com/tutorial.html
/*
HTTP GET is the easiest way to consume a web service: call a URL, add some parameters and parse the output. 
In this case the service end point is at http://free-web-services.com/add 
and the parameters must be named 'a' and 'b'. 

You can easily check the output by the next URL: http://free-web-services.com/add?a=5&b=7
*/
 
$a = 4;
$b = 9;
 
$url = 'http://free-web-services.com/add?a=' . urlencode($a) . '&b=' . urlencode($b);
 
$output = file_get_contents($url);
 
echo $output;
 
?>
