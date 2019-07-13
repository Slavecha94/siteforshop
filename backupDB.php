<html>
<head>
<META HTTP-EQUIV='Refresh' CONTENT='5; URL=naklads.php'>
<title> ЭКСПОРТ БД</title>	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>	
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/fontawesome.js"></script>
	<link rel="stylesheet" href="css/main.css">
</head>
</body>

<?php

// Параметры для подключения
$db_host = "localhost"; 
$db_user = "root"; // Логин БД
$db_password = ""; // Пароль БД
$db_base = 'ourshop'; // Имя БД
   
    // Подключение к базе данных
    $mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);

    // Если есть ошибка соединения, выводим её и убиваем подключение
	if ($mysqli->connect_error) {
	    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}

	$time = time()+25200;								
	$timeNow=date("Y_m_d_H_i_s",$time);
		
exec('c:\xampp\mysql\bin\mysqldump --user='.$db_user.' --password='.$db_password.' --host='.$db_host.' '.$db_base.' > files/backupsDB/BU_'.$db_base.'-'.$timeNow.'.sql',$return);

if (!$return) {
    echo "<br> БД ЭКСПОРТИРОВАНА УСПЕШНО";
} else {
    echo "<br> БД НЕ ЭКСПОРТИРОВАНА";
}

?>
</body>
</html>