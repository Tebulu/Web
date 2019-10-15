<?php

$client = new SoapClient('http://api.radioreference.com/soap2/?wsdl&v=latest');
$countries = $client->getCountryList();
echo "<pre>";
$types = $client->__getFunctions();
var_dump($types);
echo "<br>";
var_dump($countries);
echo "</pre>";

?>