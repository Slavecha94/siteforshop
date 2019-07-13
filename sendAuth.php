<?php
include_once("bd.php");
?>

<html>
<head>
<title>Авторизация</title>
<meta content="text/html; charset=windows-1251" http-equiv="content-type">
</head>
<body>

<?php
if (isset($_POST['logAuth']) && isset($_POST['passAuth'])) {

$login = $_POST['logAuth'];
$password = $_POST['passAuth'];

$login = stripslashes($login);
$login = htmlspecialchars($login);

$password = stripslashes($password);
$password = htmlspecialchars($password);

$login = trim($login);
$password = trim($password);
$password = md5($password);	//шифруем пароль

// Параметры для подключения
$db_host = "localhost"; 
$db_user = "root"; // Логин БД
$db_password = ""; // Пароль БД
$db_base = "ourshop"; // Имя БД
$db_table = "users"; // Имя Таблицы БД
    
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


$user = mysqli_query($mysqli,"SELECT id FROM ".$db_table." WHERE login='$login' AND password='$password'");
$id_user = mysqli_fetch_array($user);
if (empty($id_user['id'])){
	exit ("Введённый вами логин или пароль неверный!");
}

else {   
    $_SESSION['id']=$id_user['id'];		
	$_SESSION['login']=$login; 
	$_SESSION['password']=$password; 	
    

echo "<meta http-equiv='Refresh' content='0; URL=index.php'>";
}
}

?>
</body>
</html>
