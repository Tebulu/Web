<?php
$url = "http://localhost/web2/beleptet";
$data = array("login" => "Login9", "password" => "login9");
$context = stream_context_create(
    array(
        'http' =>
            array(
                'method' => 'POST',
                'header' => array('Content-Type: application/x-www-form-urlencoded'),
                'content' => http_build_query($data)
            )
    )
);
$result = file_get_contents($url, false, $context);
file_put_contents("post_stream.html", $result);
print_r($result);
?>