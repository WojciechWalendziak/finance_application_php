<?php

	session_start();
	
	if ((!isset($_POST['new_login'])) || (!isset($_POST['new_password'])) || (!isset($_POST['new_name'])) || (!isset($_POST['new_surname'])))
	{
		header('Location: rejestracja.php');
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
		$new_name = $_POST['new_name'];
		$new_login = $_POST['new_login'];
		$new_password = $_POST['new_password'];
		$new_surname = $_POST['new_surname'];
		
		$new_name = htmlentities($new_name, ENT_QUOTES, "UTF-8");
		$new_surname = htmlentities($new_surname, ENT_QUOTES, "UTF-8");
		$new_login = htmlentities($new_login, ENT_QUOTES, "UTF-8");
		$new_password = htmlentities($new_password, ENT_QUOTES, "UTF-8");
	
		//if ($result = @$database_connection->query(
		$txt = sprintf("SELECT * FROM users_list WHERE user_login='%s' OR user_password='%s'",
		mysqli_real_escape_string($database_connection,$new_login),
		mysqli_real_escape_string($database_connection,$new_password));
		
		$result = $database_connection->query($txt);
		
		$ilu_userow = $result->num_rows;

		if($ilu_userow == 0)
		{
			$sql = "INSERT INTO users_list (user_first_name, user_surname, user_login, user_password) VALUES ('$new_name', '$new_surname', '$new_login', '$new_password')";
		}
		else
		{				
			$_SESSION['blad'] = '<span style="color:red">Login lub hasło juz zajete!</span>';
			header('Location: logowanie.php');	
			echo "0 results";
		}
		if ($database_connection->query($sql) === TRUE)
		{
			$_SESSION['blad'] = '<span style="color:red">Konto zostalo stworzone, proszę się zalogować</span>';
			header('Location: logowanie.php');	
		} 
		else 
		{
			echo "Error: " . $sql . "<br>" . $database_connection;
		}
	}
	$database_connection->close();
?>