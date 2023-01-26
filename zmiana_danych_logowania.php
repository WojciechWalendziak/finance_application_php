
<?php

session_start();

if (!isset($_SESSION['zalogowany']))
	{
		header('Location: logowanie.php');
		exit();
	}

?>
<!DOCTYPE html>
<html lang="pl"></html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha1284-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha1284-A12rJD856KowSb7dwlZdYEkO129Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="styles/styles.css" type="text/css"/>
</head>
<tbody onload="current_date()">
  <h1>Tu mozesz zmienic swoje dane:</h1>
  <form class="container" action="zmien_dane_logowania.php" method="post">
      
        <div class="row">
          <div class="col-sm-3"></div>
          <div class="col-sm-6">
            <div class="select_field_common">
              <div class="row">
                <div class="col-sm-1"></div>  
                <div class="col-sm-10">
                  <div class="row row_margin">
                    <div class="col-sm-6">
                      <label for="login">Podaj nowy login:</label><br>
                    </div>
                    <div class="col-sm-6">
                      <input type="text" id="login" name="new_login" placeholder="new login"><br><br>
                    </div>
                  </div>
                </div>
                <div class="col-sm-1"></div>
              </div>
              <div class="row">
                <div class="col-sm-1"></div>  
                <div class="col-sm-10">
                  <div class="row end_margin">
                    <div class="col-sm-6">
                      <label for="haslo">Podaj nowe haslo:</label><br>
                    </div>
                    <div class="col-sm-6">
                      <input type="text" id="password" name="new_password" placeholder="new password"><br><br><br><br>
                    </div>
                  </div>
                </div>
                <div class="col-sm-1"></div> 
              </div>
            </div>
          </div>
          <div class="col-sm-3"></div>
        </div>
      
        <div>
          <input class="submit_button" type="submit" value="Submit">
        </div>
  </form>
  <form class="container" action="return_to_menu.php" method="post">
    <input class="submit_button" type="submit" value="Wróć do Menu">
  </form>
</tbody>
</html>

