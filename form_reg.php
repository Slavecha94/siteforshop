<?php
include_once("bd.php");

if(empty($login) and empty($password)){
	
include_once("header_notlog.php");

include_once("contentNotAuth.php");
}

else{
include_once("header_log.php");
include_once("contentAuth.php");
}
?>

<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	<title> Регистрация </title>
	
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>	
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/fontawesome.js"></script>
</head>
<body>
	


<center> <h4 class='display-4'> Регистрация</h4> </center>
 <div class="container h-200">
  <div class="row h-150 justify-content-center align-items-center">
    <form class="col-12" action="sendReg.php" method="POST">
      <div class="form-group">
        <label for="formGroupExampleInput">Логин<font color="red">*</font></label>
        <input type="text" class="form-control" name="loginReg" id="formGroupExampleInput" placeholder="Введите логин">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Пароль<font color="red">*</font></label>
        <input type="text" class="form-control" name="passReg" id="formGroupExampleInput2" placeholder="Введите пароль">
      </div>
	  <div class="form-group">
        <label for="formGroupExampleInput3">Подтверждение пароля <font color="red">*</font></label>
        <input type="text" class="form-control" name="passReg2" id="formGroupExampleInput3" placeholder="Подтвердите пароль">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput4">E-mail<font color="red">*</font></label>
        <input type="text" class="form-control" name="mailReg" id="formGroupExampleInput4" placeholder="Введите e-mail">
      </div>
	  <div class="form-group">
        <label for="formGroupExampleInput5">Имя<font color="red">*</font></label>
        <input type="text" class="form-control" name="nameReg" id="formGroupExampleInput5" placeholder="Как Вас зовут ?">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput6">Фамилия<font color="red">*</font></label>
        <input type="text" class="form-control" name="famReg" id="formGroupExampleInput6" placeholder="Введите фамилию">
      </div>
	  <button type="submit" class="btn btn-primary btn-lg btn-block">Зарегистрироваться</button>
    </form>   
  </div>  
</div>
<div class="container">
<center><font face="Verdana" size="4">Поля со значком <font color="red">*</font> должны быть обязательно заполнены!</font> </center>
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