<?php

  include "felhasznalo.class.php";

  echo "Hallgató teszt:<br><br>";
  $teszt1 = new Hallgato("János", "1000 Város Útca 1", "NJE00001",
                         "janos", "1990-10-02", "Informatika");
  $teszt1->jegybeir(3);
  $teszt1->jegybeir(5);
  $teszt1->jegybeir(4);
  //$teszt1->kiir();
  kiir($teszt1);
  
  echo "<br><br>Admin teszt:<br><br>";
  $teszt2 = new Admin("Mária", "2000 Falú Út 2", "PAE00002",
                      "maria", "1980-01-02", 150000, "Adminisztrátor");
  kiir($teszt2);
  $teszt2->fizetesemeles(20000);
  $teszt2->feladatmodositas("Szuper adminisztrátor");
  echo "<br>";
  kiir($teszt2);

  echo "<br><br>Tanár teszt:<br><br>";
  $teszt3 = new Tanar("Béla", "3000 Település Tér 3", "PAE00003",
                      "bela", "1968-03-01", 170000, "Informatika");
  kiir($teszt3);
  $teszt3->tantargyfelvesz("Programozás I", Array("András", "Gábor", "Péter"));
  $teszt3->tantargyfelvesz("Programozás II", Array("Benedek", "István", "János", "Márk"));
  $teszt3->tantargyfelvesz("Algoritmus",  Array("András", "Dániel", "Dominik", "Gábor", "Péter"));
  kiir($teszt3);
  $teszt3->tantargyfelvesz("Programozás II", Array("Oooooh..."));
  kiir($teszt3);
  $teszt3->tantargylevesz("Programozás II");
  kiir($teszt3);
  $teszt3->tantargyfelvesz("Programozás III", Array("Tibor", "Zoltán", "Zsolt"));
  kiir($teszt3);
  
  echo "Felhasználók száma: ".Felhasznalo::felhasznalokSzama();
  
?>
