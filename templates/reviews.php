<?php 
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
	<script src="js/jquery.min.js"></script>	
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/fontawesome.js"></script>
</head>
<body>
<center> <h1 class='display-6'> Отзывы</h1> </center>

<div class="container h-150">

<?php 
include_once("reviews_load.php");
?>
  <hr>
</div>

 <div class="container h-150">
 <center> <h1 class='display-6'> Оставить отзыв</h1> </center>
  <div class="row h-100 justify-content-center align-items-center">
    <form class="col-12" action="sendRev.php" method="POST">
      <div class="form-group">
        <label for="formGroupExampleInput">Ваше имя </label>
        <input type="text" name="fioRev" class="form-control" id="formGroupExampleInput" required placeholder="Введите логин" >
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Ваша почта</label>
        <input type="text" name="mailRev" class="form-control" id="formGroupExampleInput2" required placeholder="Введите пароль" >
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput3">Отзыв</label>
        <input type="text" name="review" class="form-control" id="formGroupExampleInput3" required placeholder="Введите пароль">
      </div>	  
	  <div class="form-group">
        <label for="formGroupExampleInput4">Оценка (1-5)</label>        
		<input type="text" name="mark" class="form-control" id="formGroupExampleInput4" onkeyup="this.value=this.value.replace(/[^0-9]+/g,''); isright(this);" required placeholder="Введите оценка">
      </div>	  
	  <div class="form-group">
        <label for="formGroupExampleInput5">Ссылка на фото (необязательно)</label>        
		<input type="text" name="photo_url" class="form-control" id="formGroupExampleInput5" required placeholder="Укажите ссылку">		
      </div>	  
	  <button type="submit" class="btn btn-primary btn-lg btn-block">Оставить отзыв</button>
    </form>   
  </div>  
  <hr>
</div>

<!--
<script> function isright(obj){
if (obj.value>5) obj.value=5; 
if (obj.value<1) obj.value=1;
}
</script>
-->
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