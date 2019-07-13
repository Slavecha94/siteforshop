<?php
if(empty($login) and empty($password)){
	
include_once("header_notlog.php");}
else{
	include_once("header_log.php");
}
?>

<html>
<head>
<!-- Задаем время для возврата на предыдущую страницу  -->
<META HTTP-EQUIV='Refresh' CONTENT='5; URL=index.php'> 
<title> Регистрация </title>
</head>
<body>

<?php 
if (isset($_POST['loginReg']) && isset($_POST['passReg']) && isset($_POST['passReg2']) && isset($_POST['mailReg']) && isset($_POST['nameReg']) && isset($_POST['famReg'])){

// Переменные с формы
$loginReg = $_POST['loginReg'];
$passReg = $_POST['passReg'];
$passReg2 = $_POST['passReg2'];
$mailReg= $_POST['mailReg'];
$nameReg= $_POST['nameReg'];
$famReg= $_POST['famReg'];
$nowdate= date("Y.m.d H:i:s");

$loginReg = trim($loginReg);
$passReg = trim($passReg);
$passReg = md5($passReg);	//шифруем пароль
$passReg2 = trim($passReg2);
$passReg2 = md5($passReg2);	//шифруем пароль
   
// Параметры для подключения
$db_host = "localhost"; 
$db_user = "root"; // Логин БД
$db_password = ""; // Пароль БД
$db_base = 'ourshop'; // Имя БД
$db_table = "users"; // Имя Таблицы БД
    
    // Подключение к базе данных
    $mysqli = new mysqli($db_host,$db_user,$db_password,$db_base);

	// Если есть ошибка соединения, выводим её и убиваем подключение
	if ($mysqli->connect_error) {
	    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}

	// замена кодировки
	if (!$mysqli->set_charset("utf8")){		
		exit();
	}
	
	$query = $mysqli->query("SELECT id FROM ".$db_table." WHERE login='$loginReg' and email='$mailReg'");
		if ($query->num_rows>0){
		echo '<font color="red">Пользователь с таким логином и email зарегистрирован!</font> Через 5 секунд вы вернетесь на главную страницу!';
		exit();			
	}			
	
    $result = $mysqli->query("INSERT INTO ".$db_table." (login,password,password2,email,reg_date,name_user,last_name) VALUES ('$loginReg','$passReg','$passReg2','$mailReg','$nowdate','$nameReg','$famReg')");
    if ($result == true){
    	echo "<br> Пользователь зарегистрирован в БД! Через 5 секунд вы вернетесь на главную страницу!";
    }else{
		echo "<br> Пользователь незарегистрирован в БД! Через 5 секунд вы вернетесь на главную страницу!";
	}
}
?>

</body>
</html>