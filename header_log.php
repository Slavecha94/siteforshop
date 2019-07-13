<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title> </title>

	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/fontawesome.js"></script>

</head>
<body>


<!-- Nav - Меню и шапка сайта -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
	<div class="container-fluid">
		<a href="index.php" class="navbar-brand"><img src="img/logo.gif"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive"> 
			<!-- прятает меню на маленьких устройствах и при сужении экрана -->
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">				
					<center> Сегодня 
					<?php		
						$time = time();								
						echo date("d.m.Y H:i:s",$time + 21600).'<br>';						
							function getDayRus(){								
								$days = array( 'Воскресенье', 'Понедельник', 'Вторник', 'Среда','Четверг', 'Пятница', 'Суббота');
								return $days[(date('w'))];
							}
							echo getDayRus();						
					?>
					</center>				
				</li>											
				<li class="nav-item active">				
					<center> Привет <font color="GREEN">
					<?php
						echo $login;
					?>
					</font></center>				
				</li>								
				<li class="nav-item">
					<a href="upravlenie.php" class="nav-link">Управление и отчеты</a>
				</li>				
				<li class="nav-item">
					<a href="reviews.php" class="nav-link">Отзывы</a>
				</li>				
				<li class="nav-item">
					<a href="gallery.php" class="nav-link">Галерея</a>
				</li>
				<li class="nav-item">
					<a href="feedback.php" class="nav-link">Обратная связь</a>
				</li>
				<li class="nav-item">
					<a href="exit.php" class="nav-link">Выход</a>
				</li>				
			</ul>
		</div>
	</div>
	</nav>

<!-- Scripts -->
            <script src="js/jquery-1.9.1.min.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>
            <script src="js/less.min.js"></script>
            <script src="js/owl-carousel/owl.carousel.min.js"></script>
            <script src="js/sns-extend.js"></script>
            <script src="js/custom.js"></script>