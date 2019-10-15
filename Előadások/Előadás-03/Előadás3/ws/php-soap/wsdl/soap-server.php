<?php

function hossz($szo) {
    $eredmeny = strlen($szo);
    return $eredmeny;
}

function forditott($szo) {
    $forditott = "";
    for($i=strlen($szo)-1; $i>=0; $i--)
        $forditott .= $szo[$i];
    $eredmeny = Array("eredeti"=>$szo, "forditott"=>$forditott);
    return $eredmeny;
}

function reszszavak($szo) {
    $eredmeny = Array();
    for($i=0; $i<strlen($szo); $i++)
        for($j=1; $j<=strlen($szo)-$i; $j++)
            $eredmeny[] = substr($szo, $i, $j);
    return $eredmeny;
}

$server = new SoapServer("words.wsdl");
$server->addFunction('hossz');
$server->addFunction('forditott');
$server->addFunction('reszszavak');
$server->handle();

?>
