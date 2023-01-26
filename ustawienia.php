<?php

session_start();
if (!isset($_SESSION['zalogowany']))
	{
		//echo isset($_SESSION['zalogowany']);
		header('Location: logowanie.php');
		exit();
	}
?>
<!DOCTYPE html>
<html lang="pl"></html>
<html>
	<head>
		<title>menu</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="styles/styles.css" type="text/css"/>
	</head>
	<body>
		<div class="wrapper">
			<div class="header">
					<span>WYBIERZ OPERACJĘ:</span>
			</div>
			<div class="row">
      			<div class="col-sm-2"></div>
      			<div class="col-sm-8">
					<div class="row">
						<div class="col-sm-6">
							<div class="link_item"><a href="zmiana_danych_logowania.php">Zmien dane logowania</a></div>
							<div class="link_item"><a href="dodawanie_kategori_przychodow.php">Dodaj kategorie przychodow</a></div>
						</div>
						<div class="col-sm-6">
							<div class="link_item"><a href="dodawanie_kategori_wydatkow.php">Dodaj kategorie wydatkow</a></div>
							<div class="link_item"><a href="dodawanie_metody_platnosci.php">Dodaj metode platnosci</a></div>
						</div>
					</div>
				</div>
				<div class="col-sm-2"></div>
			</div>
		</div>
	</body>
</html>

