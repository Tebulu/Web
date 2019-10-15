<?php
if($_SERVER['REQUEST_METHOD'] == "PUT") {
	$data = array();
	$incoming = file_get_contents("php://input");
	parse_str($incoming, $data);
	echo "Felhasználó: ".$data["user"]." új email címe: " .
			  filter_var($data["email"], FILTER_VALIDATE_EMAIL);
} 
else {
	echo "um?";
}
?>
