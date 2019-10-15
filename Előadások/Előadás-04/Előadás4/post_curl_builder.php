<?php
$url = "http://localhost/web2/beleptet";
$data = array("login" => "Login9", "password" => "login9");
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
file_put_contents("post_curl_builder.html", $result);
print_r($result);
?>