<?php
  try {
  
    // Kapcsolódás
    $dbh = new PDO('mysql:host=localhost;dbname=web2', 'root', '',
                  array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
    
    // Megkaptuk az adatokat?
    if(isset($_POST['id']))
    {
      // Felesleges szóközök eldobása
      $_POST['id'] = trim($_POST['id']);
      $_POST['csn'] = trim($_POST['csn']);
      $_POST['un'] = trim($_POST['un']);
      $_POST['bn'] = trim($_POST['bn']);
      $_POST['jel'] = trim($_POST['jel']);
      
      // Ha nincs id és megadtak minden adatot (családi név, utónév, bejelentkezési név, jelszó), akkor beszúrás
      if($_POST['id'] == "" && $_POST['csn'] != "" && $_POST['un'] != "" && $_POST['bn'] != "" && $_POST['jel'] != "")
      {
        $sql = "insert into felhasznalok values (0, '".$_POST['csn']."', '".$_POST['un']."', '".$_POST['bn']."', '".sha1($_POST['jel'])."')";
        //echo $sql."<br>";
        $count = $dbh->exec($sql);
        $newid = $dbh->lastInsertId();
        echo $count." beszúrt sor: ".$newid."<br>";
      }
      
      // Ha nincs id de nem adtak meg minden adatot
      elseif($_POST['id'] == "")
      {
        echo "Hiba: Hiányos adatok!";
      }
      
      // Ha van id, amely >= 1, és megadták legalább az egyik adatot (családi név, utónév, bejelentkezési név, jelszó), akkor módosítás
      elseif($_POST['id'] >= 1 && ($_POST['csn'] != "" || $_POST['un'] != "" || $_POST['bn'] != "" || $_POST['jel'] != ""))
      {
        $sql = "update felhasznalok set
                csaladi_nev = ".($_POST['csn'] == "" ? "csaladi_nev" : "'".$_POST['csn']."'").", 
                utonev = ".($_POST['un'] == "" ? "utonev" : "'".$_POST['un']."'").", 
                bejelentkezes = ".($_POST['bn'] == "" ? "bejelentkezes" : "'".$_POST['bn']."'").", 
                jelszo = ".($_POST['jel'] == "" ? "jelszo" : "sha1('".$_POST['jel']."')")."
                where id = ".$_POST['id'];
        //echo $sql."<br>";
        $count = $dbh->exec($sql);
        echo $count." módosított sor: ".$_POST['id']."<br>";
      }
      
      // Ha van id, amely >=1, de nem adtak meg legalább az egyik adatot
      elseif($_POST['id'] >= 1)
      {
        echo "Hiba: Módosítandó (Id): ".$_POST['id'].", de nem adták meg mit kell módosítani!<br>";
      }
      
      // Ha van id, de rossz az id, akkor a hiba kiírása
      else
      {
        echo "Hiba: Rossz azonosító (Id): ".$_POST['id']."<br>";
      }
    }
    
    // A tábla sorainak a lekérdezése
    $sql = "SELECT * FROM felhasznalok";     
    $sth = $dbh->query($sql);
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    /*
    echo "<pre>";
    print_r($rows);
    echo "</pre>";
    */
  }
  catch (PDOException $e) {
    echo "Hiba: ".$e->getMessage();
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>MySql</title>
    <meta charset="utf-8">
  </head>
  <body>
    <h1>Felhasználók:</h1>
    <?php
      echo "<TABLE>";
      foreach($rows as $row) {
        echo "<TR>";
        foreach($row as $column) {
          echo "<TD>";
          echo $column." ";
          echo "</TD>";
        }
        echo "</TR>";
      }
      echo "</TABLE>";
    ?>
    <br>
    <h2>Módosítás / Beszúrás</h2>
    <form action="kesz_1.php" method="post">
    Id: <input type="text" name="id"><br><br>
    Családi név: <input type="text" name="csn" maxlength="45"> Utónév: <input type="text" name="un" maxlength="45"><br><br>
    Bejelentkezési név: <input type="text" name="bn" maxlength="12"> Jelszó: <input type="text" name="jel"><br><br>
    <input type="submit" value = "Küldés">
    </form>
  </body>
</html>
