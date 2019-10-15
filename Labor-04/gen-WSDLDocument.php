<?php
error_reporting(0);
require 'mobilok.php';
require './WSDLDocument/WSDLDocument.php';
$wsdl = new WSDLDocument('Mobilok', "http://localhost/web2/szerver.php", "http://localhost/web2/");
$wsdlfile = $wsdl->saveXML();
echo $wsdlfile;
file_put_contents ("mobilok.wsdl" , $wsdlfile);
?>
