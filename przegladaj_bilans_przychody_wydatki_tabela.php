<?php

  //include 'connect_test_db.php';
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
    $user_id = $_SESSION['user_id'];

    $incomes = sprintf("SELECT category, amount, payment_date, additional_comment FROM income_list WHERE users_id='%s'",
    mysqli_real_escape_string($database_connection,$user_id));
    $incomes .= " ORDER BY amount DESC";
    $income_result = $database_connection->query($incomes);

		$expenses = sprintf("SELECT category, amount, payment_date, payment_method, additional_comment FROM expenses_list WHERE users_id='%s'", 
    mysqli_real_escape_string($database_connection,$user_id));
    $expenses .= " ORDER BY amount DESC"; 
    $expense_result = $database_connection->query($expenses);
		
  }
?>
<!DOCTYPE html>
<html lang="pl"></html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="/html_new/styles/styles.css" type="text/css"/>
<script src="/html_new/scripts/przegladaj_bilans_tabele.js"></script>
</head>
<body>
  <div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="close_modal()">&times;</span>
      <p>Podaj szukany okres: </p>
      <form>
        <label for="start_date">Data poczatkowa:</label><br>
        <input type="date" id="start_date" name="date" placeholder="mm/dd/yyyy"><br><br>
      </form>
      <form>
        <label for="end_date">Data koncowa:</label><br>
        <input type="date" id="end_date" name="date" placeholder="mm/dd/yyyy"><br><br>
      </form>
      <div id="submit"><input class="submit_button" type="submit" onclick="filter_by_own_timeframe()" value="Submit"></div>
    </div>
  </div>
  <div class="select_field select_field_common">
    <label for="period">Wybierz zakres:</label>
    <select name="period" id="period" onchange="transform_table()">
      <option value=""></option>
      <option value="biezacy_miesiac">Bieżący miesiąc</option>
      <option value="poprzedni_miesiac">Poprzedni miesiąc</option>
      <option value="biezacy_rok">Bieżacy rok</option>
      <option value="cala_historia">Cała historia</option>
      <option value="niestandardowy">Niestandardowy</option>
    </select>
  </div>
  <div class="tables">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <table class="container my_border" id="income_table">
            <tbody class="my_border">
              <tr class="row">
                <th class="col-sm-3">Kategorie Przychodow</th>
                <th class="col-sm-3">Kwoty</th>
                <th class="col-sm-3">Daty</th>
                <th class="col-sm-3">Komentarz</th>
              </tr>
              <?php
                  while($row = $income_result->fetch_assoc()) 
                  {
                    ?>
                      <tr class="row">
                        <td class="col-sm-3"><?php echo $row['category'];?></td>
                        <td class="col-sm-3"><?php echo $row['amount'];?></td>
                        <td class="col-sm-3"><?php echo $row['payment_date'];?></td>
                        <td class="col-sm-3"><?php echo $row['additional_comment'];?></td>
                        </tr>
                      <?php
                  }
              ?>
            </tbody>
          </table>
        </div>
        <div class="col-sm-6">
          <table class="container" id="expense_table">
          <tbody class="my_border">
            <tr class="row">
              <th class="col-sm-3">Kategorie Wydatkow</th>
              <th class="col-sm-2">Kwoty</th>
              <th class="col-sm-2">Daty</th>
              <th class="col-sm-2">Sposob platnosci</th>
              <th class="col-sm-3">Komentarz</th>
            </tr>
            <?php
                while($row = $expense_result->fetch_assoc()) 
                {
                  ?>
                    <tr class="row">
                      <td class="col-sm-3"><?php echo $row['category'];?></td>
                      <td class="col-sm-2"><?php echo $row['amount'];?></td>
                      <td class="col-sm-2"><?php echo $row['payment_date'];?></td>
                      <td class="col-sm-2"><?php echo $row['payment_method'];?></td>
                      <td class="col-sm-3"><?php echo $row['additional_comment'];?></td>
                    </tr>
                  <?php
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <form class="container" action="return_to_menu.php" method="post">
    <input class="submit_button" type="submit" value="Wróć do Menu">
  </form>
</body>