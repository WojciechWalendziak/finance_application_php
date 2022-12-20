
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
  <link rel="stylesheet" href="/html_new/styles/styles.css" type="text/css"/>
</head>
<tbody onload="current_date()">
  <h1>Tu mozesz zmienic swoje dane:</h1>
  <form class="container" action="zmien_dane_logowania.php" method="post">
    <div class="row">
      <div class="select_field_common">
        <div class="col-sm-6">
          <label for="login">Podaj nowy login:</label><br>
          <input type="text" id="login" name="new_login" placeholder="new login"><br><br>
        </div>
        <div class="col-sm-6">
          <label for="haslo">Podaj nowe haslo:</label><br>
          <input type="text" id="password" name="new_password" placeholder="new password"><br><br><br><br>
        </div>
      </div>
    </div>
    <div id="submit_data_change">
      <input class="submit_button" type="submit" value="Submit">
    </div>
  </form>
  <h1>Tu mozesz dodać nową kategorię przychodów:</h1>
  <form class="container" action="dodaj_kategorie_przychodow.php" method="post">
    <div class="row">
      <div class="select_field_common">
        <div class="col-sm-12">
          <label for="przychod_kategoria">Podaj nową kategorię:</label><br>
          <input type="text" id="income_category" name="new_income_category" placeholder="new income category"><br><br>
        </div>
      </div>
    </div>
    <div id="submit_new_income_category">
      <input class="submit_button" type="submit" value="Submit">
    </div>
  </form>
  <h1>Tu mozesz dodać nową kategorię wydatków:</h1>
  <form class="container" action="dodaj_kategorie_wydatkow.php" method="post">
    <div class="row">
      <div class="select_field_common">
        <div class="col-sm-12">
          <label for="wydatek_kategoria">Podaj nową kategorię:</label><br>
          <input type="text" id="expense_category" name="new_expense_category" placeholder="new expense category"><br><br>
        </div>
      </div>
    </div>
    <div id="submit_new_expense_category">
      <input class="submit_button" type="submit" value="Submit">
    </div>
  </form>
  <h1>Tu mozesz dodać nową metodę płatności:</h1>
  <form class="container" action="dodaj_metode_platnosci.php" method="post">
    <div class="row">
      <div class="select_field_common">
        <div class="col-sm-12">
          <label for="metoda_platnosci">Podaj nową metodę:</label><br>
          <input type="text" id="payment_method" name="new_payment_method" placeholder="new payment method"><br><br>
        </div>
      </div>
    </div>
    <div id="resubmit_new_payment_method">
      <input class="submit_button" type="submit" value="submit">
    </div>
  </form>
  <form class="container" action="return_to_menu.php" method="post">
    <input class="submit_button" type="submit" value="Wróć do Menu">
  </form>
</tbody>
</html>

