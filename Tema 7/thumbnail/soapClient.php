
<?php
//--- Construct the SOAP client --------------------
$client = new SoapClient('https://api.thumbnail.ws/soap?wsdl');
//--- Get all websites we want screenshots for -----
include_once('data.php');
//--- Loop through all websites --------------------
foreach ($websites as $website) {
    echo "Getting screenshot for " . $website['name'] . "<br>";

    try {
        $response = $client->get(array(
            "apikey"   => 'ab71790432baff84f666f457feb11db24f6fedf9d18e',
            "url"      => $website['url'],
            "width"    => 380
        ));
        //--- Image is base64 encoded in transport. Decode it here.
        $image = base64_decode($response->image);

        //--- Save image to disk
        file_put_contents(dirname(__FILE__) . '/screenshot' . $website['id'] . '.jpg', $image);
    } catch (SoapFault $fault) {
        echo "Error: " . $fault->faultcode . ": " . $fault->getMessage() . "\n";
    }
}
