<html>
<head>
<title> Склад </title>	
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>	
	<script src="js/popper.min.js"></script>
	<script src="js/fontawesome.js"></script>
	<link rel="stylesheet" href="css/main.css">
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

echo'
<div class="dropdown" style="display:inline-block;">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Управление
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Наличие товара на складе</a>    
	<a class="dropdown-item" href="#">Пользователи</a>    
  </div>
</div>

<div class="dropdown" style="display:inline-block;">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Приход и расход
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Приход товара</a>
    <a class="dropdown-item" href="#">Расход товара</a>
    <a class="dropdown-item" href="#">Поставщики</a>
  </div>
</div>

<div class="dropdown" style="display:inline-block;">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Отчеты
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Отчет по приходам</a>
    <a class="dropdown-item" href="#">Отчет по расходам</a>    
  </div>
</div>
';
}

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