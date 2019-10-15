<?php

class UjHallgato {
    /**
     * @var string
     */
    public $hibakod;
  
    /**
     * @var string
     */
    public $uzenet;

    /**
     * @var integer
     */
    public $ujsorszam;
}

class Hallgato {
    /**
     * @var integer
     */
    public $sorszam;
  
    /**
     * @var string
     */
    public $nev;
  
    /**
     * @var string
     */
    public $neptun;
  
    /**
     * @var string
     */
    public $szak;
}

class HallgatokLista {
  
    /**
     * @var string
     */
    public $hibakod;
  
    /**
     * @var string
     */
    public $uzenet;

    /**
     * @var Hallgato[]
     */
    public $hallgatok;
}

class Hallgatok {
  
  /**
    *  @param string $nev
    *  @param string $neptun
    *  @param string $szak
    *  @return UjHallgato
    */
  public function ujHallgato($nev, $neptun, $szak){
  
	$eredmeny = array("hibakod" => 0,
					  "uzenet" => "",
					  "ujsorszam" => 0);
	
	try {
	  $dbh = new PDO('mysql:host=localhost;dbname=zh',
					 'root', '',
					array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	  $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
  
	  $sql = "insert into hallgatok values (0, :nev, :neptun, :szak)";
	  $sth = $dbh->prepare($sql);
	  $sth->execute(array(":nev" => $nev, ":neptun" => $neptun, ":szak" => $szak));
	  $eredmeny['ujsorszam'] = $dbh->lastInsertId();;
	}
	catch (PDOException $e) {
	  $eredmeny["hibakod"] = 1;
	  $eredmeny["uzenet"] = $e->getMessage();
	}
	
	return $eredmeny;
  }

  /**
    *  @return HallgatokLista
    */
  function hallgatokLista(){
  
	$eredmeny = array("hibakod" => 0,
					  "uzenet" => "",
					  "hallgatok" => Array());
	
	try {
	  $dbh = new PDO('mysql:host=localhost;dbname=zh',
					 'root', '',
					array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	  $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

	  $sql = "select sorszam, nev, neptun, szak from hallgatok order by sorszam";
	  $sth = $dbh->prepare($sql);
	  $sth->execute(array());
	  $eredmeny["hallgatok"] = $sth->fetchAll(PDO::FETCH_ASSOC);
	}
	catch (PDOException $e) {
	  $eredmeny["hibakod"] = 1;
	  $eredmeny["uzenet"] = $e->getMessage();
	}
	
	return $eredmeny;
  }
}

?>