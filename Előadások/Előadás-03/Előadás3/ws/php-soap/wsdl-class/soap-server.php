<?php

class Szavak {
    public function hossz($szo)
    {
        $eredmeny = strlen($szo);
        return $eredmeny;
    }
    public function forditott($szo)
    {
        $forditott = "";
        for($i=strlen($szo)-1; $i>=0; $i--)
            $forditott .= $szo[$i];
        $eredmeny = Array("eredeti"=>$szo, "forditott"=>$forditott);
        return $eredmeny;
    }
    public function reszszavak($szo)
    {
        $eredmeny = Array();
        for($i=0; $i<strlen($szo); $i++)
            for($j=1; $j<=strlen($szo)-$i; $j++)
                $eredmeny[] = substr($szo, $i, $j);
        return $eredmeny;
    }
}


$server = new SoapServer("words.wsdl");
$server->setClass('Szavak');
$server->handle();
?>
