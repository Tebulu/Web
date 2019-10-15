<?php
$url = "http://localhost/web2/";
$result = file_get_contents($url);
file_put_contents("get_stream.html", $result);
print_r($result);
?>