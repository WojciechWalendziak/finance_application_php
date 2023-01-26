<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: logowanie.php');
		exit();
	}
	
	require_once "connect.php";

	$database_connection = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($database_connection->connect_errno!=0)
	{
		echo "Error: ".$database_connection->connect_errno;
	}
	else
	{
		$category = $_POST['new_expense_category'];
		
		$category = htmlentities($category, ENT_QUOTES, "UTF-8");
		
		$sql = "INSERT INTO expense_categories (expense_category) VALUE ('$category')";

		if ($database_connection->query($sql) === TRUE)
		{
			echo '<!DOCTYPE html><html lang="pl"></html><html><head><link rel="stylesheet" href="/public_html/styles/styles.css" type="text/css"/></head><tbody><h1>Kategoria zostala dodana</h1><form class="container" action="return_to_menu.php" method="post"><input class="submit_button" type="submit" value="Wróć do Menu"></form></tbody</html>';
		} 
		else
		{
			echo 'Error: ' . $sql . '<br>' . $database_connection;
			echo '<link rel="stylesheet" href="styles/styles.css" type="text/css"/><form class="container" action="return_to_menu.php" method="post"><input class="submit_button" type="submit" value="Wróć do Menu"></form>';
		}
	}
	$database_connection->close();
?>