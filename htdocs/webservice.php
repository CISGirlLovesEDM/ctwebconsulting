<?php
//echo 'test'; die();

$headers = array();
$headers[] = 'Accept: application/xml';
$headers[] = 'Content-Type: application/xml; charset=UTF-8';

$xmlstr = '<?xml version="1.0" encoding="UTF-8"?>
<PaymentPostBack xmlns="http://www.officialpayments.com/PaymentPostBack/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
    <paymentIdentifier>193267</paymentIdentifier>
    <resultCode>A</resultCode>
    <resultText>Approved</resultText>
    <customDataElements/>
    <transactionDate>2015-08-17</transactionDate>
    <transactionTime>11:26:55</transactionTime>
    <paymentAmounts>
        <paymentAmount sequenceNumber="1">6.00</paymentAmount>
    </paymentAmounts>
    <transactionFee>1.95</transactionFee>
    <totalCharge>7.95</totalCharge>
    <accountType>VISA</accountType>
    <authorizationCode>123456</authorizationCode>
    <receiptNumber>123456</receiptNumber>
    <paymentID>1</paymentID>
    <phoneNumber>3309265711</phoneNumber>
    <name>
        <first>TEST</first>
        <middle/>
        <last>TEST</last>
        <suffix/>
    </name>
    <address>
        <street1>123 TEST ST</street1>
        <street2/>
        <city>Akron</city>
        <stateOrProvince>OH</stateOrProvince>
        <zipOrPostalCode>44313</zipOrPostalCode>
        <countryCode>US</countryCode>
    </address>
    <emailAddress>ctorres@schd.org</emailAddress>
    <paymentChannel>net</paymentChannel>
</PaymentPostBack>';

$url = 'https://vitals.scph.org/vitals/completeOrder/193267';

$ch = curl_init($url);
//$xmlstr = file_get_contents('test.xml');



curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlstr);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
//curl_setopt($ch, CURLOPT_PORT, 18650);


$output = curl_exec($ch);
curl_close($ch);
print_r($output);
?>
