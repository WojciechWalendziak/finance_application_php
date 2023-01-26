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
    <link rel="stylesheet" href="styles/styles.css" type="text/css"/>
    <title>Bootstrap 5 -index</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="scripts/rejestracja.js"></script>
  </head>
  <body>
    <h1>Załóż Konto:</h1>
    <div class="row">
      <div class="col-sm-3"></div>
      <div class="col-sm-6">
        <form class="form_field" action="zarejestruj.php" method="post">
          <div class="select_field_common">
            <div class="row">
              <div class="col-sm-2"></div>  
              <div class="col-sm-8">
                <div class="row row_margin">
                  <div class="col-sm-6">
                    <label for="new_name">Imie:</label><br>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" id="new_name" name="new_name" placeholder="my name" required><br><br>
                  </div>
                </div>
              </div>
              <div class="col-sm-2"></div>
            </div>
            <div class="row">
              <div class="col-sm-2"></div>
              <div class="col-sm-8">
                <div class="row row_margin">
                  <div class="col-sm-6 col_height">
                    <label for="surname">Nazwisko:</label><br>
                  </div>
                  <div class="col-sm-6 col_height">
                    <input type="text" id="new_surname" name="new_surname" required><br><br>
                  </div>
                </div>
              </div>
              <div class="col-sm-2"></div>
            </div>
            <div class="row">
              <div class="col-sm-2"></div>  
              <div class="col-sm-8">
                <div class="row row_margin">
                  <div class="col-sm-6">
                    <label for="new_login">Login:</label><br>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" id="new_login" name="new_login" placeholder="my login" required><br><br>
                  </div>
                </div>
              </div>
              <div class="col-sm-2"></div>
            </div>
            <div class="row">
              <div class="col-sm-2"></div>
              <div class="col-sm-8">
                <div class="row end_margin">
                  <div class="col-sm-6 col_height">
                    <label for="new_pass">Haslo:</label><br>
                  </div>
                  <div class="col-sm-6 col_height">
                    <input type="password" id="new_pass" name="new_password" required><br><br>
                  </div>
                </div>
              </div>
              <div class="col-sm-2"></div>
            </div>
          </div>
          <div>
            <input class="submit_button" type="submit" value="Submit">
          </div>
        </form>
      </div>
      <div class="col-sm-3"></div>
    </div>
    <?php
      if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
    ?>
  </body>
</html>

