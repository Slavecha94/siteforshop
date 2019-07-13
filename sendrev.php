<?php
if(empty($login) and empty($password)){
	
include_once("header_notlog.php");}
else{
	include_once("header_log.php");
}
?>

<html>
<head>
<!-- Задаем время для возврата на предыдущую страницу -->
<META HTTP-EQUIV='Refresh' CONTENT='5; URL=reviews.php'>
<title> Отправка отзыва </title>
</head>
<body>

<?php 
if (isset($_POST['fioRev']) && isset($_POST['mailRev']) && isset($_POST['review'])){

// Переменные с формы
$fio = $_POST['fioRev'];
$mailRev = $_POST['mailRev'];
$review = $_POST['review'];
$mark= $_POST['mark'];
$nowdate= date("Y.m.d H:i:s");
    
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
	if (!$mysqli->set_charset("utf8")) {
    //printf("Ошибка при загрузке набора символов utf8: %s\n", $mysqli->error);
    exit();
	}
    
    $result = $mysqli->query("INSERT INTO ".$db_table." (name,email,review,data_review) VALUES ('$fio','$mailRev','$review','$nowdate')");    
    if ($result == true){
		
    	echo "Информация занесена в базу данных! Через 5 секунд вы вернетесь на страницу Отзывы!";
    }else{
		
    	echo "Информация не занесена в базу данных! Через 5 секунд вы вернетесь на страницу Отзывы!";
    }
}
?>

</body>
</html>