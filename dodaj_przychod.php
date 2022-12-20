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
		$category = $_POST['category'];
		$amount = $_POST['amount'];
		$date = $_POST['date'];
		$additional_comment = $_POST['additional_comment'];
		$user_id = $_SESSION['user_id'];
		
		$category = htmlentities($category, ENT_QUOTES, "UTF-8");
		$amount = htmlentities($amount, ENT_QUOTES, "UTF-8");
		$date = htmlentities($date, ENT_QUOTES, "UTF-8");
		
		$sql = "INSERT INTO income_list (category, amount, payment_date, users_id, additional_comment) VALUES ('$category', '$amount', '$date', '$user_id', '$additional_comment')";

		if ($database_connection->query($sql) === TRUE)
		{
			echo "Przychod zostal dodany";
			echo '<link rel="stylesheet" href="/html_new/styles/styles.css" type="text/css"/><form class="container" action="return_to_menu.php" method="post"><input class="submit_button" type="submit" value="Wróć do Menu"></form>';
		} 
		else
		{
			echo "Error: " . $sql . "<br>" . $database_connection;
			echo '<link rel="stylesheet" href="/html_new/styles/styles.css" type="text/css"/><form class="container" action="return_to_menu.php" method="post"><input class="submit_button" type="submit" value="Wróć do Menu"></form>';
		}
	}
	$database_connection->close();
?>