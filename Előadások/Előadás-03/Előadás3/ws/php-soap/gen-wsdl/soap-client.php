<!DOCTYPE html>
<html>
<head>
    <title>Szavak</title>
    <meta charset="utf-8">
</head>
<body>
<?php

    try {
        $client = new SoapClient("http://localhost/ws/php-soap/gen-wsdl/words.wsdl");
        
        $szo = "teszt";
        
        $hossz = $client->hossz($szo);
        echo "Eredmény (hossz):<br>";
        var_dump($hossz);
        echo "<br>";
        
        $forditott = $client->forditott($szo);
        echo "Eredmény (forditott):<br>";
        var_dump($forditott);
        echo "<br>";
        
        $reszszavak = $client->reszszavak($szo);
        echo "Eredmény (reszszavak):<br>";
        var_dump($reszszavak);
        echo "<br>";
        
    } catch (SoapFault $e) {
        echo "<pre>";
        var_dump($e);
        echo "</pre>";
    }
    
?>
</body>
</html>