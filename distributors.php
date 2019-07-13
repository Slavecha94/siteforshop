<?php 
include_once("bd.php");

if(empty($login) and empty($password)){
	
include_once("header_notlog.php");}
else{
	include_once("header_log.php");
}
	

?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	<title> Отзывы </title>
	
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/scripts.js"></script>
	<script src="js/jquery.min.js"></script>	
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/fontawesome.js"></script>
</head>
<body>
<center> <h1 class='display-6'> ПОСТАВЩИКИ</h1> </center>

<div class="container h-150">

<?php 
include_once("distributor_show.php");
?>
  <hr>
</div>

 <div class="container h-150">
 <center> <h1 class='display-6'> Добавить поставщика</h1> </center>
  <div class="row h-100 justify-content-center align-items-center">
    <form class="col-12" action="distributor_add.php" method="POST">
      <div class="form-group">
        <label for="formGroupExampleInput">Компания </label>
        <input type="text" name="company" class="form-control" id="formGroupExampleInput" required placeholder="Укажите наименование компании" >
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">ФИО торгового представителя</label>
        <input type="text" name="fio" class="form-control" id="formGroupExampleInput2" required placeholder="Укажите ФИО т/п" >
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput3">№ телефона</label>
        <input type="text" name="phone" class="form-control" id="formGroupExampleInput3" required placeholder="Укажите № телефона т/п">
      </div>	  	  
	  <button type="submit" class="btn btn-primary btn-lg btn-block">Сохранить т/п в базе</button>
    </form>   
  </div>  
  <hr>
</div>


			<script src="js/scripts.js"></script>
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