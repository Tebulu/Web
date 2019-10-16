<?php

public interface Kiirhato{
public function kiir();
}

public abstract class Felhasznalo implements Kiirhato{
private $felhasznalok_szama = 0;

private $nev;
private $cim;
private $kod;
private $jelszo;
private $szuletesi_ev;

public function __construct($nev, $cim, $kod, $jelszo, $szuletesi_ev) {
$this->nev=$nev;
$this->cim=$cim;
$this->kod=$kod;
$this->jelszo=$jelszo;
$this->szuletesi_ev=$szuletesi_ev;

$this->felhasznalok_szama++;
}

public function adatok() {
	$eredmeny = Array('nev'=>$this->nev, 'cim'=>$this->cim, 'kod'=>$this->kod, 'jelszo'=>$this->jelszo, 'szuletesi_ev'=>$this->szuletesi_ev);
	return $eredmeny;
	
}

public function kor() {
	echo "aktualis kor: ".time()-$this->szuletesi_ev;
}

public function felhasznalok(){
echo $this->felhasznalok_szama;
}
}

class Hallgato extends Felhasznalo {
	private $hallgatok_szama = 0;
	private static $jegy_szamlalo = 0;
	private $szak;
	private $jegyek = Array();

public function hallgatok(){
echo $this->hallgatok_szama;
}	

public function __construct($nev, $cim, $kod, $jelszo, $szuletesi_ev, $szak) {
parent::__construct($nev, $cim, $kod, $jelszo, $szuletesi_ev);
$this->szak=$szak;
$this->hallgatok_szama++;
}

public function adatok() {
	$eredmeny = Array('nev'=>$this->nev, 'cim'=>$this->cim, 'kod'=>$this->kod, 'jelszo'=>$this->jelszo, 'szuletesi_ev'=>$this->szuletesi_ev, 'szak'=>$this->szak);
	return $eredmeny;
}

public function jegybeir($jegy) {
	if (self::$jegy_szamlalo < 5) $jegyek[self::$jegy_szamlalo++] = $jegy;
}

}

class Dolgozo extends Felhasznalo {
	private $dolgozok_szama = 0;
	private $ber;
	
	public function dolgozok_szama(){
	echo $this->dolgozok_szama;
}	

public function __construct($nev, $cim, $kod, $jelszo, $szuletesi_ev, $ber) {
parent::__construct($nev, $cim, $kod, $jelszo, $szuletesi_ev);
$this->ber=$ber;
$this->dolgozok_szama++;
}

public function adatok() {
	$eredmeny = Array('nev'=>$this->nev, 'cim'=>$this->cim, 'kod'=>$this->kod, 'jelszo'=>$this->jelszo, 'szuletesi_ev'=>$this->szuletesi_ev, 'ber'=>$this->ber);
	return $eredmeny;
}

public function beremeles($emeles) {
	$this->ber=$this.ber+$emeles; 
	if ($this->ber < 0) $this->ber = 0;
}
	
}


?>
