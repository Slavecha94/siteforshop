<?php 
// Параметры для подключения
$db_host = "localhost"; 
$db_user = "root"; // Логин БД
$db_password = ""; // Пароль БД
$db_base = 'ourshop'; // Имя БД
$db_table = "distributors"; // Имя Таблицы БД
    
    // Подключение к базе данных
    $mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);

    // Если есть ошибка соединения, выводим её и убиваем подключение
	if ($mysqli->connect_error) {
	    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}

	// замена кодировки
mysqli_query($mysqli,"SET NAMES utf8");
$results = mysqli_query($mysqli,"SELECT * FROM ".$db_table);

$row_res=mysqli_query($mysqli,"SELECT COUNT(*) FROM ".$db_table);
$row = mysqli_fetch_row($row_res);
//кол-во строк
$total = $row[0]; 
//кол-во строк
$total = $row[0]; 
while($row = mysqli_fetch_assoc($results)){
	if ($row>0){					
echo '<option value='.$row['id'].'>'.$row['name'].'</option>';
	
}
}			
?>