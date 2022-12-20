<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: menu.php');
		exit();
	}

?>
<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/html_new/styles/styles.css" type="text/css"/>
  <script src="/html_new/scripts/logowanie.js"></script>
</head>
<body>
  <div class="wrapper">
    <h1>Logowanie:</h1>
    <form id="form_field" action="zaloguj.php" method="post">
      <div class="row">
        <div class="col-sm-6">
          <label for="login">Login:</label><br>
          <input type="text" id="login" name="login" placeholder="login" required><br><br>
        </div>
        <div class="col-sm-6">
          <label for="haslo">haslo:</label><br>
          <input type="password" id="myPass" name="password" required><br><br>
          <input type="checkbox" onclick="show_password()">Show Password
        </div>
      </div>
      <div id="submit">
        <input class="submit_button" type="submit" value="Submit">
      </div>
    </form>
  </div>
  <?php
    if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
  ?>
</body>
</html>

