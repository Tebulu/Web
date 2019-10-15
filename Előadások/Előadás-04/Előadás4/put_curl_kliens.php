<?php
$url = 'http://localhost/ea4/put_szerver.php';
$data = array("user" => "Xyz", "email" => "xyz@xyz.hu" );
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
file_put_contents("put_curl_kliens.txt", $result);
print_r($result);
?>
