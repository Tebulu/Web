<!DOCTYPE html>
<html>
<head>
    <title>Tesztelo lap</title>
    <meta charset="utf8">
</head>
<body>
<?php
include_once "osztalyok.php";

$tanarok=Array();

$tanarok[] = new Vezeto('Elso Tanar','ehakod1.kefo','Matematika');
$tanarok[] = new Tanar('Masodik Tanar','ehakod2.kefo','Fizika');
$tanarok[] = new Tanar('Harmadik Tanar','ehakod3.kefo','Informatika');
$tanarok[] = new Vezeto('Negyedik Tanar','ehakod4.kefo','Infromatika');
$tanarok[] = new Tanar('Otodik Tanar','ehakod5.kefo','Matematika');
$tanarok[] = new Tanar('Hatodik Tanar','ehakod6.kefo','Infromatika');
$tanarok[] = new Vezeto('Hetedik Tanar','ehakod7.kefo','Fizika');

$tanarok[0]->beosztott($tanarok[4]);
$tanarok[3]->beosztott($tanarok[2]);
$tanarok[3]->beosztott($tanarok[5]);
$tanarok[6]->beosztott($tanarok[1]);

 echo "<pre>";
 foreach($tanarok as $tanar)
    print_r($tanar->adatai());
 echo "</pre>";
?>
</body>
</html>