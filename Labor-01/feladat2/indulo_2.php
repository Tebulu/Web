<?php

  /*
  echo "<pre>";
  print_r($_POST);
  echo "</pre>";
  */

?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <style>
    h1 {
      margin: 0px 10px;
    }
    .left {
      float: left;
      border: 1px solid black;
      padding: 10px;
      margin: 10px;
    }
    #bottom {
      clear: both;
      margin: 10px;
    }
    form {
      text-align: right;
    }
    input {
      margin: 2px;
      padding: 5px;
      width: 150px;
    }
  </style>
  <title>PHP - MYSQL</title>
  </head>
  <body>
  <h1>Belépés vagy regisztráció</h1>
  <div>
    <div class="left">
      <form name="belepes" action="indulo_2.php" method="post">
      <label for="login">Login:<input type = "text" name="login" id = "login"></label><br> 
      <label for="jelszo">Jelszó: <input type = "password" name="jelszo" id = "jelszo"></label><br> 
      <input type="submit" name="belepes" value="Belépés"><br>
      </form>
    </div>
    <div class="left">
      <form name="regisztracio" action="indulo_2.php" method="post">
      <label for="csaladi_nev">Családi név: <input type = "text" name="csaladi_nev" id = "csaladi_nev"></label><br>
      <label for="utonev">Utónév: <input type = "text" name="utonev" id = "utonev"></label><br>
      <label for="login_nev">Login: <input type = "text" name="login_nev" id = "login_nev"></label><br>
      <label for="jelszo_reg">Jelszó: <input type = "password" name="jelszo_reg" id = "jelszo_reg"></label><br> 
      <input type="submit" name="regisztracio" value="Regisztráció"><br>
      </form>
    </div>
  </div>
  <div id="bottom">
  &copy 2019 WEB-programozás II - 1. gyakorlat
  </div>
  </body>
</html>
