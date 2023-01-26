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
				<div class="logo">
					<img src="images/papers_image.jpg" style="float: left;"/>
					<span>TWOJE FINANSE</span>
				</div>
			</div>
				<div class="row">
      				<div class="col-sm-4"></div>
      				<div class="col-sm-4">
						<div class="main_menu">
							<div class="link_item"><a href="dodawanie_przychodu.php">Dodaj przychod</a></div>
							<div class="link_item"><a href="dodawanie_wydatku.php">Dodaj wydatek</a></div>
							<div class="link_item"><a href="przegladaj_bilans_przychody_wydatki_tabela.php">Przegladaj Bilans</a></div>
							<div class="link_item"><a href="ustawienia.php">Ustawienia</a></div>
							<div class="link_item"><a href="logout.php">Wyloguj sie</a></div>
						</div>
					</div>
					<div class="col-sm-4"></div>
				</div>
			
		</div>
	</body>
</html>

