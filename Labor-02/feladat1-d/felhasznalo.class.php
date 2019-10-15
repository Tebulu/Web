<?php

interface Kiir {
  public function kiir();
}

/* ------------------------------------------------------------------------ */
abstract class Felhasznalo implements Kiir {
  private static $felhasznalok = 0;
  
  private $nev;
  private $cim;
  private $kod;
  private $jelszo;
  private $szuletes_datum;
  
  public static function felhasznalokSzama() {
    return self::$felhasznalok;  
  }
  
  public function __construct ($nev, $cim, $kod, $jelszo, $szuletes_datum) {
      self::$felhasznalok++;
      
      $this->nev = $nev;
      $this->cim = $cim;
      $this->kod = $kod;
      $this->jelszo = sha1($jelszo);
      $this->szuletes_datum = $szuletes_datum;
  }
  
  public function kor() {
    $ts = strtotime($this->szuletes_datum);
    if($ts === -1) {
      return "Ismeretlen";
    }
    else {
      return date("Y", time() - $ts) - 1970;
    }
  }
  
  public function kiir() {
      echo "Név: ".$this->nev."<br>";
      echo "Cím: ".$this->cim."<br>";
      echo "Kod: ".$this->kod."<br>";
      echo "jelszo: ".$this->jelszo."<br>";
      echo "Születési dátum: ".$this->szuletes_datum."<br>";
      echo "Kor: ".$this->kor()."<br>";
  }
  
  public function __clone() {
    self::$felhasznalok++;
  }
}

/* ------------------------------------------------------------------------ */
class Hallgato extends Felhasznalo {
  private $szak;
  private $jegyek = array();
  
  public function __construct($nev, $cim, $kod, $jelszo, $szuletes_datum, $szak) {
    parent::__construct($nev, $cim, $kod, $jelszo, $szuletes_datum);
    $this->szak = $szak;
  }
  
  public function jegybeir($jegy) {
    if(count($this->jegyek) == 5)
      return false;
    else {
      $this->jegyek[] = $jegy;
      return true;
    }
  }
  
  public function kiir() {
    parent::kiir();
    echo "Jegyek:";
    foreach($this->jegyek as $jegy)
      echo " ".$jegy;
    echo " Átlag: ".number_format(array_sum($this->jegyek) / count($this->jegyek), 2, ",", " ")."<br>";
  }
}

/* ------------------------------------------------------------------------ */
abstract class Dolgozo extends Felhasznalo {
  private $fizetes;
  
  public function __construct($nev, $cim, $kod, $jelszo, $szuletes_datum, $fizetes) {
    parent::__construct($nev, $cim, $kod, $jelszo, $szuletes_datum);
    $this->fizetes = $fizetes;
  }
  
  public function fizetesemeles($emeles) {
    $this->fizetes += $emeles;
  }
  
  public function kiir() {
    parent::kiir();
    echo "Fizetes: ".number_format($this->fizetes, 0, ",", " ")."<br>";
  }
}

/* ------------------------------------------------------------------------ */
class Admin extends Dolgozo {
  private $feladat;
  
  public function __construct($nev, $cim, $kod, $jelszo, $szuletes_datum, $fizetes, $feladat) {
    parent::__construct($nev, $cim, $kod, $jelszo, $szuletes_datum, $fizetes);
    $this->feladat = $feladat;
  }
  
  public function feladatmodositas($feladat) {
    $this->feladat = $feladat;
  }
  
  public function kiir() {
    parent::kiir();
    echo "Feladat: ".$this->feladat."<br>";
  }
}

/* ------------------------------------------------------------------------ */
class Tanar extends Dolgozo {
  private $tantargy = array();
  private $hallgatok = array();
  private $tanszek;
  
  public function __construct($nev, $cim, $kod, $jelszo, $szuletes_datum, $fizetes, $tanszek) {
    parent::__construct($nev, $cim, $kod, $jelszo, $szuletes_datum, $fizetes);
    $this->tanszek = $tanszek;
  }
  
  public function tantargyfelvesz($tantargy, $hallgatok) {
    if(in_array($tantargy, $this->tantargy))
      return false;
    if(count($this->tantargy) == 3)
      return false;
    $this->tantargy[] = $tantargy;
    $this->hallgatok[] = $hallgatok;
    return true;
  }
  
  public function tantargylevesz($tantargy) {
    $index = array_search($tantargy, $this->tantargy);
    if($index === false)
      return false;
    //unset($this->tantargy[$index]);
    //unset($this->hallgatok[$index]);
    //$this->tantargy = array_values($this->tantargy);    
    //$this->hallgatok = array_values($this->hallgatok);
    array_splice($this->tantargy, $index, 1);
    array_splice($this->hallgatok, $index, 1);
    return true;
  }
  public function kiir() {
    parent::kiir();
    echo "Tanszék: ".$this->tanszek."<br>";
    echo "Tantárgyak (hallgatók):<br>";
    for($i = 0; $i < count($this->tantargy); $i++) {
      echo " ".$this->tantargy[$i]." ( ";
      foreach($this->hallgatok[$i] as $hallgato) echo $hallgato." ";
      echo ")<br>";
    }
    echo "<br>";
  }
}

/* ------------------------------------------------------------------------ */
function kiir(Kiir $obj) {
  $obj->kiir();
}


?>
