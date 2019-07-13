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
$db_table = "reviews"; // Имя Таблицы БД
    
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

while($row = mysqli_fetch_assoc($results)){
	if ($row>0){
echo '

<div class="container-fluid" style="margin-left:50px; display:inline-block; width:40%;">	
	<div class="row jumbotron">	
	
	<table class="table_rev">
	<tr>
	<td rowspan="3" class="photo_rev"> Photo </td>
	<td class="description_rev"> '.$row['name'].'</td>
	</tr>
	
	<tr>
	<td class="description_rev"> '.date("d.m.Y H:i:s", strtotime($row['data_review'])).' </td>
	</tr>
	
	<tr>
	<td > '.$row['mark'].' </td>
	</tr>
	
	<tr>
	<td colspan="2" class="text_rev"> <center> '.$row['review'].' </center> </td>
	</tr>
	<tr>
	<td style="width:80%"></td>
	<td> <button type="button" onclick="addLikes();"> Likes <span id="likes" value="0">0</span></button> </td>
	</tr>
	
	</table>
  </div>
</div>'
;
}

else{
echo '
<div class="container h-150">
Отзывов пока что нет
</div>';
	}
}
?>
	        <script src="js/jquery-1.9.1.min.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>
            <script src="js/less.min.js"></script>
            <script src="js/owl-carousel/owl.carousel.min.js"></script>
            <script src="js/sns-extend.js"></script>
            <script src="js/custom.js"></script>
</body>
</html>