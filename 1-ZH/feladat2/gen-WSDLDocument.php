<?php
error_reporting(0);
require 'hallgatok.php';
require './WSDLDocument/WSDLDocument.php';
$wsdl = new WSDLDocument('Hallgatok', "http://localhost/feladat2/szerver.php", "http://localhost/feladat2/");
$wsdlfile = $wsdl->saveXML();
echo $wsdlfile;
file_put_contents ("hallgatok.wsdl" , $wsdlfile);
?>
