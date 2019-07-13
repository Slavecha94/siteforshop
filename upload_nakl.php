<html>
<head>
 
 <META HTTP-EQUIV='Refresh' CONTENT='5; URL=naklads.php'>	
 
	<title>Результат загрузки файла</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>	
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/fontawesome.js"></script>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>

<?php

if (isset($_POST['name_distr']) || isset($_POST['numb_nakl'])){

$time = time()+25200;								
$timeNow=date("d.m.Y H.i",$time);
								
//$timeNow=date("d.m.Y ");
$name_distr=$_POST['name_distr'];
$numb_nakl=$_POST['numb_nakl'];
$sum_nakl=$_POST['sum_nakl'];

$uploaddir = 'files/naklads/';
$uploadfile = $uploaddir .$numb_nakl.' '.$name_distr.' '.$timeNow.' '.$sum_nakl.' руб. '.basename($_FILES['userfile']['name']);

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
 echo "СКАН НАКЛАДНОЙ УСПЕШНО СОХРАНЕН";
} else {
 echo "СКАН НАКЛАДНОЙ НЕ СОХРАНЕН";
}
}
/*
echo '<br>Некоторая отладочная информация:';
print_r($_FILES);
*/

?>
</body>
</html>