<?php
// http://www.hellogoogle.com/selector_combo_ajax_provincias_localidades/
    Header("Content-type: text/xml"); 
		echo'<'.'?xml version="1.0" encoding="ISO-8859-1" ?'.'>';
	$filter = $_GET['filter'];
    $xml = simplexml_load_file('provinciasypoblaciones.xml');
	$result = $xml->xpath("/lista/provincia[@id='$filter']/localidades");
    echo $result[0]->asXML();
?> 
