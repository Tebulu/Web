<?php

  include "felhasznalo.class.php";

  echo "Hallgató teszt:<br><br>";
  $teszt1 = new Hallgato("János", "1000 Város Útca 1", "NJE00001",
                         "janos", 1998, "Informatika");
  $teszt1->jegybeir(3);
  $teszt1->jegybeir(5);
  $teszt1->jegybeir(4);
  $teszt1->kiir();
  
  echo "<br><br>Dolgozó teszt:<br><br>";
  $teszt2 = new Dolgozo("Mária", "2000 Falú Út 2", "NJE00002",
                      "maria", 1980, 200000);
  $teszt2->kiir();
  $teszt2->beremeles(20000);
  echo "<br>";
  $teszt2->kiir();

  echo "Hallgató másolása:<br><br>";
  $teszt3 = clone($teszt1);
  $teszt3->jegybeir(5);
  $teszt3->jegybeir(4);
  $teszt3->jegybeir(3);
  $teszt1->kiir();
  $teszt3->kiir();
  
  echo "<br><br>Példányok megszámlálása:<br><br>";
  echo "Felhasználók száma :".Felhasznalo::felhasznalok()."<br>";
  echo "Hallgatók száma :".Hallgato::hallgatok()."<br>";
  echo "Dolgozók száma :".Dolgozo::dolgozok()."<br>";
?>
