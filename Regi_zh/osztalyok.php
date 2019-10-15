<!DOCTYPE html>
<?php
class Tanar{
    protected $nev="";
    protected $ehaKod="";
    protected $tanszek="";
    protected $hallgatokSzama=0;
    public function __construct($nev,$ehaKod,$tanszek){
        $this->nev=$nev;
        $this->ehaKod=$ehaKod;
        $this->tanszek=$tanszek;
    }
    public function adatai(){
        $eredmeny=array('nev'=> $this->nev, 'ehakod'=> $this->ehaKod, 'tanszek'=> $this->tanszek, 'hallgatokszama'=> $this->hallgatokSzama);
        return $eredmeny;
    }
    public function hallgatok($hSzam){
        $hallgatokSzama+=$hSzam;
    }
}

class Vezeto extends Tanar{
    private $beosztottak=array();
    public function adatai(){
        $eredmeny = parent::adatai();
        if($this->beosztottak!=0){
            return $eredmeny+$this->beosztottak;
        }
        return $eredmeny;
    }
    public function beosztott($beosztott){
        $this->beosztottak[]=$beosztott;
    }
}
?>