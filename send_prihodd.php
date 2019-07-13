<?php
include_once("bd.php");

if(empty($login) and empty($password)){
include_once("header_notlog.php");
}else{
include_once("header_log.php");	
}
?>

<?php
if (isset($_POST['cell'])){

echo 'РАБОТАЕТ ! ПЕРЕДАЕМ ДАННЫЕ В БД <br>';

$cell=$_REQUEST['cell']; // получение массива

//echo '<br> count columns CELL= '.count($_REQUEST['cell']).'<br> ТАБЛИЧНАЯ ЧАСТЬ <br>'; // вывод массива

foreach ($cell as $key => $value) {	
    echo 'key= '.$cell[$key].'<br>';
}

// Параметры для подключения
$db_host = "localhost"; 
$db_user = "root"; // Логин БД
$db_password = ""; // Пароль БД
$db_base = 'ourshop'; // Имя БД
$db_table = "prihod"; // Имя Таблицы БД
    
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
	} else{
		echo 'БД подключена <br>';
	}
    
    $result = $mysqli->query("INSERT INTO ".$db_table." (postavshik, numb_prih_naklad, name_add_employee, date_prih,cat_good, name_tov, count_tov,ed_izm,invite_price,our_price) VALUES ('".implode("','", $cell)."')");    
		
    if ($result == true){
		
    	echo "<br> Приход оформлен! Продолжаем!";
    }else{
		
    	echo "<br> Приход не оформлен! Продолжаем!";
    }

}else{
echo 'NO WORK !!!';
}
?>