<?php

// Felbontjuk a param�tereket. Az & elv�laszt� jellel v�gzett felbont�s
// megfelel� lesz, els� eleme a megtekinteni k�v�nt oldal neve.
 
$request = $_SERVER['QUERY_STRING'];
$params = explode('&', $request);
$page = array_shift($params); // a k�rt oldal neve
$vars = array(); // a param�terek asszociat�v t�mbje l�trehoz�sa

foreach($params as $p) // a param�terek t�mbje felt�lt�se
{
	list($name, $value) = explode('=', $p);
	$vars[$name] = $value; // az index: a param�ter neve
}

// Meghat�rozzuk a k�rt oldalhoz tartoz� vez�rl�t. Ha megtal�ltuk
// a f�jlt �s a hozz� tartoz� vez�rl� oldalt is, akkor bet�ltj�k az
// el�bbiekben lek�rdezett param�tereket tov�bbadva. 

$target = SERVER_ROOT.'controllers/'.$page.'.php';
if(file_exists($target))
{
	include_once($target);
	$class = ucfirst($page).'_Controller';
	if(class_exists($class))
	{ $controller = new $class; }
	else
	{ die('class does not exists!'); }
}
else
{ die('page does not exist!'); }
$controller->main($vars);

// __autoload f�ggv�ny, amely ismeretlen oszt�ly h�v�sokkor,
// megpr�b�lja automatikusan bet�lteni a megfelel� f�jlt. 
// A modellekhez haszn�ljuk, egys�gesen nevezz�k el f�jljainkat
// (oszt�ly nev�vel megegyez�, csupa kisbet�s .php)

function __autoload($className)
{
	$file = SERVER_ROOT.'models/'.strtolower($className).'.php';
	if(file_exists($file))
	{ include_once($file); }
	else
	{ die("File '$filename' containing class '$className' not found."); }
}

?>