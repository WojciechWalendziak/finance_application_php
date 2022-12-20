<?php

	session_start();
	
	if ((!isset($_POST['new_login'])) || (!isset($_POST['new_password'])) || (!isset($_SESSION['zalogowany'])))
	{
		header('Location: menu.php');
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
		$user_id = $_SESSION['user_id'];
		$new_login = $_POST['new_login'];
		$new_password = $_POST['new_password'];
		
		$new_login = htmlentities($new_login, ENT_QUOTES, "UTF-8");
		$new_password = htmlentities($new_password, ENT_QUOTES, "UTF-8");
		
		$txt = "SELECT * FROM users_list WHERE user_id = $user_id";
		
		$result = $database_connection->query($txt);
		
		$ilu_userow = $result->num_rows;

		if($ilu_userow == 1)
		{
			$row = $result->fetch_assoc();
			$user_id = $row['user_id'];
			$sql = $database_connection->query("UPDATE users_list SET user_login = '$new_login', user_password = '$new_password' WHERE user_id = '$user_id'");
		}
		else
		{				
			$_SESSION['blad'] = '<span style="color:red">Operacja zmiany danych nie powiodla sie!</span><form class="container" action="return_to_menu.php" method="post"><input class="submit_button" type="submit" value="Wróć do Menu"></form>';
		}
	}
	$database_connection->close();
?>