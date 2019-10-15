<?php
$url = "http://localhost/web2/";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
file_put_contents("get_curl.html", $result);
print_r($result);
?>