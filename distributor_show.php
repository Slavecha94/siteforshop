<html>
<head>
<!-- Задаем время для возврата на предыдущую страницу 
<META HTTP-EQUIV='Refresh' CONTENT='5; URL=reviews.php'> -->
<title> Загрузка отзыва </title>	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>	
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/fontawesome.js"></script>
	<link rel="stylesheet" href="css/main.css">
</head>
</body>

<?php
if(empty($login) and empty($password)){
	
include_once("header_notlog.php");}
else{
	include_once("header_log.php");
}
?>

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
$results = mysqli_query($mysqli,"SELECT * FROM ".$db_table) or die(mysql_error());

$row_res=mysqli_query($mysqli,"SELECT COUNT(*) FROM ".$db_table);
$row = mysqli_fetch_row($row_res);
//кол-во строк
$total = $row[0];

echo '
<div class="container-fluid">			
<table>
<th style="width:20%"> <input type="text" class="form-control" style="text-align: center;" value="Компания" readonly> </th>
<th style="width:50%"> <input type="text" class="form-control" style="text-align: center;" value="Торговый представитель" readonly> </th>
<th style="width:50%"> <input type="text" class="form-control" style="text-align: center;" value="№ телефона" readonly> </th>
';
 

while($row = mysqli_fetch_assoc($results)){
	if ($row>0){
echo '
	<tr>
	<td style="width:20%"> <input type="text" class="form-control" style="text-align: center;" value='.$row['name_company'].' readonly> </td>
	<td style="width:50%"> <input type="text" class="form-control" style="text-align: center;" value='.$row['FIO_distributor'].' readonly> </td>
	<td style="width:50%"> <input type="text" class="form-control" style="text-align: center;" value='.$row['phone'].' readonly> </td>
	</tr>	
'
;
}
}

echo '
</div>
</table>';
?>
	        <script src="js/jquery-1.9.1.min.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>
            <script src="js/less.min.js"></script>
            <script src="js/owl-carousel/owl.carousel.min.js"></script>
            <script src="js/sns-extend.js"></script>
            <script src="js/custom.js"></script>
</body>
</html>