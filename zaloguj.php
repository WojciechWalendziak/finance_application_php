<?php

	session_start();
	if ((!isset($_POST['login'])) || (!isset($_POST['password'])))
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
		$login = $_POST['login'];
		$haslo = $_POST['password'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
	
		$txt = sprintf("SELECT * FROM users_list WHERE user_login='%s' AND user_password='%s'",
		mysqli_real_escape_string($database_connection,$login),
		mysqli_real_escape_string($database_connection,$haslo));
		$rezultat = $database_connection->query($txt);
		$ilu_userow = $rezultat->num_rows;
		if($ilu_userow>0)
		{
			$_SESSION['zalogowany'] = true;
			$wiersz = $rezultat->fetch_assoc();
			$_SESSION['user_id'] = $wiersz['user_id'];
			unset($_SESSION['blad']);
			$rezultat->free_result();
			header('Location: menu.php');
			exit();
		}
		else
		{			
			$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
			header('Location: rejestracja.php');	
		}
	}
		$database_connection->close();
?>