<?php

    $options = array("location" => "http://localhost/ws/php-soap/non-wsdl/soap-server.php",
                     "uri" => "http://localhost");
    
    try {
        $client = new SoapClient(null, $options);
        
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
        var_dump($e);
    }
    
?>