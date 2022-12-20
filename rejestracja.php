<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: menu.php');
		exit();
	}

?>
<!DOCTYPE html>
<html lang="pl"></html>
<html>
  <head>
    <title>rejestracja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/html_new/styles/styles.css" type="text/css"/>
    <title>Bootstrap 5 -index</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="/html_new/scripts/rejestracja.js"></script>
  </head>
  <body>
    <h1>Załóż Konto:</h1>
    <form id="form_field" class="container" action="zarejestruj.php" method="post">
      <div class="row">
        <div class="col-sm-4">
          <label for="imie">Imie:</label><br>
          <input type="text" id="imie" name="new_name" placeholder="imie"><br><br>
        </div>
        <div class="col-sm-4">
          <label for="imie">Nazwisko:</label><br>
          <input type="text" id="nazwisko" name="new_surname" placeholder="nazwisko"><br><br>
        </div>
        <div class="col-sm-4">
          <label for="email">Login:</label><br>
          <input type="text" id="login" name="new_login" placeholder="login"><br><br>
        </div>
        <div class="col-sm-4">
          <label for="haslo">haslo:</label><br>
          <input type="password" id="myPass" name="new_password"><br><br>
          <input type="checkbox" onclick="show_password()">Show Password
        </div>
        <div id="submit">
          <input class="submit_button" type="submit" value="Submit">
        </div>
      </div>
    </form>
    <?php
      if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
    ?>
  </body>
</html>

