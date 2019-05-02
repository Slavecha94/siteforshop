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


<form method="POST" action="send_prihod.php">
 <h1 class="center display-4 "> Приход товара </h1>
  <div class="form-group">
    <label for="formGroupExampleInput">Поставщик</label>	
	<div class="dropdown open">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%;">
    Выберите поставщика
  </button>  
  <div class="dropdown-menu form-control" aria-labelledby="dropdownMenu2">
    <button class="dropdown-item" type="button">Пеко</button>
    <button class="dropdown-item" type="button">Копе </button>
    <button class="dropdown-item" type="button"> <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Укажите нового"> </button>
  </div>  
</div>   
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Покупатель</label>
    <input type="text" class="form-control" id="formGroupExampleInput1" value="ИП Алферова А.Д." disabled>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput3">Склад</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" value="Основной склад" disabled>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Номер накладной</label>
    <input type="text" class="form-control" id="formGroupExampleInput3" value="Укажите номер">
	<div class="row h-100 justify-content-center align-items-center">
	<div class="center form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Сгенерировать автоматически</label>
  </div>		
  </div>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput3">Дата накладной</label>
    <input type="date" class="form-control" id="formGroupExampleInput4" name="date" value="">
  </div>  
  <hr>
<table class="table table-inverse" id="node" style="width:90%;margin-left:50px;">
  <thead>
    <tr>
      <th>№</th>
      <th>Категория</th>
      <th>Товар</th>
      <th>Кол-во</th>
	  <th>Ед. изм.</th>
      <th>Цена (закуп)</th>
      <th>Цена (наша)</th>
      <th>Сумма (закуп)</th>
    </tr>
  </thead>
  <tbody>    
	</tbody>
	
</table>
<table class="table table-inverse" id="node" style="width:90%;margin-left:50px;">
<tr>
      <th style="width:10%;" > <input type="text" class="form-control" id="formGroupExampleInput5" value="Общее кол-во" style="background-color:yellow;"></th>
      <td style="width:3%;"> <input type="text" class="form-control" id="formGroupExampleInput5" name="kol_prix"></td>      
	  <td style="width:10%;"> <input type="text" class="form-control" id="formGroupExampleInput5" value="Общая стоимость" style="background-color:yellow;"> </td>      
	  <td style="width:3%;"> <input type="text" class="form-control" id="formGroupExampleInput5"> </td>      
	  	  	  
    </tr>          
	<tr>
       <td colspan="8"> <button id="addRow" onclick="getStr();" type="button" class="btn btn-success"  style="width:100%;">Добавить строку</button></td>
    </tr>
	<tr>
	<td colspan="8"> <button type="button" class="btn btn-danger" style="width:100%;">РАССЧЕТ</button></td>
	</tr>
	<tr>
	<td colspan="8"> <button type="submit" class="btn btn-primary" style="width:100%;">СОХРАНИТЬ</button></td>
	</tr>
</table>
</form>
<hr>

<?php
include_once("footer.php");
 }
else{
include_once("header_log.php");
}
?>

<script>
var inc=0;
function getStr() {
    var row = document.createElement("tr");
	inc=inc+1;
    row.innerHTML = 
	  "<td> <input type='text' name='cell["+inc+1+"]' class='form-control' id='formGroupExampleInput5' value="+inc+"> </td>"+
      "<td> <input type='text' name='cell["+inc+2+"]' class='form-control' id='formGroupExampleInput6'> </td>"+
      "<td> <input type='text' name='cell["+inc+3+"]' class='form-control' id='formGroupExampleInput7'> </td>"+
	  "<td> <input type='text' name='cell["+inc+4+"]' class='form-control' id='formGroupExampleInput8'> </td>"+
	  "<td> <input type='text' name='cell["+inc+5+"]' class='form-control' id='formGroupExampleInput9'> </td>"+
	  "<td> <input type='text' name='cell["+inc+6+"]' class='form-control' id='formGroupExampleInput10'> </td>"+
	  "<td> <input type='text' name='cell["+inc+7+"]' class='form-control' id='formGroupExampleInput11'> </td>"+
	  "<td> <input type='text' name='cell["+inc+8+"]' class='form-control' id='formGroupExampleInput12'> </td>";
    document.getElementById("node").appendChild(row);
}

<?php

include_once("footer.php");

?>

</script>


			<script src="js/scripts.js"></script>
	        <script src="js/jquery-1.9.1.min.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>
            <script src="js/less.min.js"></script>
            <script src="js/owl-carousel/owl.carousel.min.js"></script>
            <script src="js/sns-extend.js"></script>
            <script src="js/custom.js"></script>
</body>
</html>