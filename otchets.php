<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title> </title>

	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>	
	<script src="js/fontawesome.js"></script>

</head>
<body>


<?php
if(empty($login) and empty($password)){	
include_once("header_notlog.php");
echo 'Ты неавторизован. Тебе сюда нельзя! <br>';
/*
echo '<html>
<head>
<META HTTP-EQUIV="Refresh" CONTENT="5; URL=index.php">
</head>
</html>
';*/
?>

<div class="btn-group">
<button class="btn dropdown-toggle" data-toggle="dropdown">Действие <span class="caret"></span></button>
<ul class="dropdown-menu">
<li><a href="#">Действие</a></li>
<li><a href="#">Другое действие</a></li>
<li><a href="#">Еще что-нибудь</a></li>
<li class="divider"></li>
<li><a href="#">Отделенный пункт</a></li>
</ul>
</div>

<?php }
else{
include_once("header_log.php");
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