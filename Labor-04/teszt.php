<!DOCTYPE HTML>
<html>
  <head>
  <meta charset="utf-8">
  <title>MOBILOK</title>
  </head>

  <?php
  $client = new SoapClient('http://localhost/web2/mobilok.wsdl');
  
  $markak = $client->getmarkak();
  echo "<pre>";
  print_r($markak);
  echo "</pre>";
  
  $modellek = $client->getmodellek('001');
  echo "<pre>";
  print_r($modellek);
  echo "</pre>";

  $modellek = $client->getmodellek('002');
  echo "<pre>";
  print_r($modellek);
  echo "</pre>";

  $modellek = $client->getmodellek('003');
  echo "<pre>";
  print_r($modellek);
  echo "</pre>";

  ?>
    
  <body>
  </body>
</html>