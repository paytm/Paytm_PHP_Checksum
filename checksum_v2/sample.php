<?php
/* More Details: https://developer.paytm.com/docs/checksum/#php */

require_once("./PaytmChecksum.php");

/* Generate Checksum via Array */
/* initialize an array */
$paytmParams = array();

$paytmParams["MID"]           = "YOUR_MID_HERE";
$paytmParams["ORDER_ID"]      = "YOUR_ORDER_ID_HERE";

/**
* Generate checksum by parameters we have
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$paytmChecksum = PaytmChecksum::generateSignature($paytmParams, 'YOUR_MERCHANT_KEY');
$verifyChecksum = PaytmChecksum::verifySignature($paytmParams, 'YOUR_MERCHANT_KEY', $paytmChecksum);
echo sprintf("generateSignature Returns: %s\n", $paytmChecksum);

if($verifyChecksum == true){
   echo "Checksum is verified";
}else{
   echo "Checksum is not verified";
}


/* Generate Checksum via String */
/* initialize JSON String */  
$body = "{\"mid\":\"YOUR_MID_HERE\",\"orderId\":\"YOUR_ORDER_ID_HERE\"}";

/**
* Generate checksum by parameters we have in body
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$paytmChecksum = PaytmChecksum::generateSignature($body, 'YOUR_MERCHANT_KEY');
$verifyChecksum = PaytmChecksum::verifySignature($body, 'YOUR_MERCHANT_KEY', $paytmChecksum);
echo sprintf("generateSignature Returns: %s\n", $paytmChecksum);

if($verifyChecksum == true){
   echo "Checksum is verified";
}else{
   echo "Checksum is not verified";
}