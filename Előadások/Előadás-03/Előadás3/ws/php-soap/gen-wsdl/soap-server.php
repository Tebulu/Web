<?php
require("words.php");

$server = new SoapServer("words.wsdl");
$server->setClass('Szavak');
$server->handle();

?>
