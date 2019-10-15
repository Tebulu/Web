<?php

error_reporting(0);

require 'words.php';
require './WSDLDocument/WSDLDocument.php';
$wsdl = new WSDLDocument('Szavak', "http://localhost/ws/php-soap/gen-wsdl/soap-server.php", "http://localhost/ws/php-soap/gen-wsdl/");
$wsdlfile = $wsdl->saveXML();
echo $wsdlfile;
file_put_contents ("words.wsdl" , $wsdlfile);

?>
