<html>
<head>
<META HTTP-EQUIV='Refresh' CONTENT='5; URL=index.php'>
<title> Отправка отзыва </title>	
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
if (isset($_POST['email'])){

// Переменные с формы
$email = $_POST['email'];
$nowdate= date("Y.m.d H:i:s");
    
// Параметры для подключения
$db_host = "localhost"; 
$db_user = "root"; // Логин БД
$db_password = ""; // Пароль БД
$db_base = 'ourshop'; // Имя БД
$db_table = "subscription"; // Имя Таблицы БД
    
    // Подключение к базе данных
    $mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);

	// замена кодировки
	if (!$mysqli->set_charset("utf8")) {
    //printf("Ошибка при загрузке набора символов utf8: %s\n", $mysqli->error);
    exit();
	} else {
    //printf("Текущий набор символов: %s\n", $mysqli->character_set_name());
	}
	
    // Если есть ошибка соединения, выводим её и убиваем подключение
	if ($mysqli->connect_error) {
	    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}
    
	$test_find=$mysqli->query("select * from ".$db_table." where adress_sub='$email'");
	$rows = mysqli_fetch_row($test_find);
	//кол-во строк
	$total = $rows[0];
	if ($total>0){
		echo 'Вы уже подписаны! Через 5 секунд вы вернетесь на главную страницу!';
		exit;
	}
	else{
		
	
    $result = $mysqli->query("INSERT INTO ".$db_table." (adress_sub,date_sub) VALUES ('$email','$nowdate')");    
    if ($result == true){
		
    	echo "Подписка оформлена! Через 5 секунд вы вернетесь на главную страницу!";
    }else{
		
    	echo "Подписка не оформлена! Через 5 секунд вы вернетесь на главную страницу!";
    }
}
}
?>
			<script src="js/scripts.js"></script>
	        <script src="js/jquery-1.9.1.min.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>
            <script src="js/less.min.js"></script>
            <script src="js/owl-carousel/owl.carousel.min.js"></script>
            <script src="js/sns-extend.js"></script>
            <script src="js/custom.js"></script>
</body>
</html>