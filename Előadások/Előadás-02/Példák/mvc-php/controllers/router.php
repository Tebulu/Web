<?php

// Felbontjuk a paramétereket. Az & elválasztó jellel végzett felbontás
// megfelelõ lesz, elsõ eleme a megtekinteni kívánt oldal neve.
 
$request = $_SERVER['QUERY_STRING'];
$params = explode('&', $request);
$page = array_shift($params); // a kért oldal neve
$vars = array(); // a paraméterek asszociatív tömbje létrehozása

foreach($params as $p) // a paraméterek tömbje feltöltése
{
	list($name, $value) = explode('=', $p);
	$vars[$name] = $value; // az index: a paraméter neve
}

// Meghatározzuk a kért oldalhoz tartozó vezérlõt. Ha megtaláltuk
// a fájlt és a hozzá tartozó vezérlõ oldalt is, akkor betöltjük az
// elõbbiekben lekérdezett paramétereket továbbadva. 

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

// __autoload függvény, amely ismeretlen osztály hívásokkor,
// megpróbálja automatikusan betölteni a megfelelõ fájlt. 
// A modellekhez használjuk, egységesen nevezzük el fájljainkat
// (osztály nevével megegyezõ, csupa kisbetûs .php)

function __autoload($className)
{
	$file = SERVER_ROOT.'models/'.strtolower($className).'.php';
	if(file_exists($file))
	{ include_once($file); }
	else
	{ die("File '$filename' containing class '$className' not found."); }
}

?>