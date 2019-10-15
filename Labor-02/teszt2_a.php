<?php

  include "felhasznalo.class.php";

  $teszt1 = new Admin("Mária", "2000 Falú Út 2", "NJE00002",
                      "maria", "1980-01-02", 150000, "Adminisztrátor");
  $teszt2 = clone $teszt1;
  kiir($teszt1);
  kiir($teszt2);
  echo "<br>";
  $teszt1->fizetesemeles(20000);
  $teszt1->feladatmodositas("Szuper adminisztrátor");
  kiir($teszt1);
  kiir($teszt2);
  echo "<br>Felhasználók száma: ".Felhasznalo::felhasznalokSzama();

?>
