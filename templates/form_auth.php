<?php 
include_once("header_notlog.php");
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	<title> Авторизация </title>
	
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>	
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/fontawesome.js"></script>
</head>
<body>
<center> <h1 class='display-6'> Авторизация</h1> </center>
	

 <div class="container h-50">
  <div class="row h-100 justify-content-center align-items-center">
    <form class="col-12">
      <div class="form-group">
        <label for="formGroupExampleInput">Логин</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Введите логин">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Пароль</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Введите пароль">
      </div>
	  <button type="button" class="btn btn-primary btn-lg btn-block">Войти</button>
    </form>   
  </div>  
</div>
 
 	
		
		    <script src="js/jquery-1.9.1.min.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>
            <script src="js/less.min.js"></script>
            <script src="js/owl-carousel/owl.carousel.min.js"></script>
            <script src="js/sns-extend.js"></script>
            <script src="js/custom.js"></script>
</body>
</html>
 <?php
 include_once("carousel.php");
 include_once("footer.php");
 ?>