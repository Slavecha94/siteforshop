<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title> НАКЛАДНЫЕ </title>
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
$login="NoName";	
include_once("header_notlog.php");
include_once("menu_sklad.php");
echo 'Ты неавторизован. Тебе сюда нельзя! <br>';
/*
echo '<html>
<head>
<META HTTP-EQUIV="Refresh" CONTENT="5; URL=index.php">
</head>
</html>
';*/
?>

 <form action="upload_nakl.php" method="post" enctype="multipart/form-data" style="width:90%;margin-left:50px;">
 <h1 class="center display-4 "> ДОБАВЛЕНИЕ НАКЛАДНОЙ </h1> 
  <div class="form-group">
    <label for="formGroupExampleInput">Поставщик</label>	
	<div class="row h-100 justify-content-center align-items-center">
	<div class="center form-check">
	<input type="checkbox" class="checkbox" onclick="checkPostav();" id="changePost" value="a"> <span id="vib_post">Ввод поставщика вручную</span> </input>
  </div>  
  </div>
  
  <select name="min" id="spisokPost" onchange="changePoost();" data-live-search="true" class="select_min dropdown-toggle" style="width:100%; background-color:red; display:none;" disabled>
	<option></option>
  <?php
include_once("load_distributors.php");
?>	 
	</select>
  </div>  
  <div class="form-group">
    <label for="formGroupExampleInput2">Или укажите вручную</label>
    <input type="text" name="name_distr" class="form-control" id="postavshikk" style="background-color:green;" required>
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput3">Номер накладной</label>
    <input type="text" name="numb_nakl" class="form-control" id="numbNakl" value="" required>
	
	<div class="row h-100 justify-content-center align-items-center">
	<div class="center form-check">
	<input type="checkbox" class="checkbox" onclick="checkGenerate();" id="autoCheck">Сгенерировать автоматически	 
  </div>  
  </div>  
  </div>  
  
  <div class="form-group">
    <label for="formGroupExampleInput4">СУММА В НАКЛАДНОЙ (не обяз)</label>
    <input type="text" name="sum_nakl" class="form-control" value="" required>
  </div>

<!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
    <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
    <!-- Название элемента input определяет имя в массиве $_FILES -->
    <br><input name="userfile" type="file"></input><br><br>
	<button type="submit" class="btn btn-primary" style="width:100%;">СОХРАНИТЬ НАКЛАДНУЮ</button>   
</form>
<br>
<hr>
<br>
 <form action="find_nakl.php" method="post" style="width:90%;margin-left:50px;">
 <h1 class="center display-4 "> ПОИСК НАКЛАДНОЙ </h1> 
  <div class="form-group">
    <label for="formGroupExampleInput">ПАРАМЕТР ПОИСКА</label>	
	
  <select name="min" id="spisokPost" onchange="changePoost();" data-live-search="true" class="select_min dropdown-toggle" style="width:100%; background-color:red; display:none;" disabled>
	<option value="0"> </option>
	<option value="1"> ПОСТАВЩИК </option>
	<option value="2"> ДАТА </option>
  	</select>
  </div>  
  <div class="form-group">
    <label for="formGroupExampleInput2">КРИТЕРИЙ ПОИСКА</label>
    <input type="text" name="mainCell[1]" class="form-control" id="postavshikk" style="background-color:green;" required>
  </div>  
    <input type="submit" value="НАЙТИ" />  
  
</form>

<div id="vivod_nakl">

  <?php

include_once("load_nakl.php");

?>	 
<hr>
</div>


<?php
include_once("footer.php");
 }
else{
include_once("header_log.php");
include_once("menu_sklad.php");
}
?>

<?php

include_once("footer.php");

?>

<script>

/*

//картинки из папки
var folder = "files/naklads/";

$.ajax({
    url : folder,
    success: function (data) {
        $(data).find("a").attr("href", function (i, val) {
            if( val.match(/\.(jpe?g|png|gif)$/) ) { 
                $("body").append( "<img src='"+ folder + val +"' style='height:100px; width:100px;'>" );
            } 
        });
    }
});
*/

// передача поставщика в инпут
function changePoost(){	
	// получаем индекс выбранного элемента
	var selind = document.getElementById("spisokPost").options.selectedIndex;
	var txt = document.getElementById("spisokPost").options[selind].text;
	var val = document.getElementById("spisokPost").options[selind].value;	
	document.getElementById('postavshikk').value = txt;
	}

// выбор методики определения поставщика	
	function checkPostav(){
	var chbox;
	chbox=document.getElementById('changePost');
	if (chbox.checked) {
		alert('Выбор поставщика из списка!');		
		document.getElementById('vib_post').innerHTML = 'Выбор поставщика из списка';
		document.getElementById('postavshikk').disabled = true;
		document.getElementById('spisokPost').disabled = false;
		document.getElementById("spisokPost").style="background-color:green; width:100%;";
		document.getElementById("spisokPost").style.display = '';
		document.getElementById("postavshikk").style="background-color:red; width:100%;";		
	}
	else {
		alert ('Ввод поставщика вручную!');
		document.getElementById('vib_post').innerHTML = 'Ввод поставщика вручную';
		document.getElementById('postavshikk').disabled = false;
		document.getElementById('spisokPost').disabled = true;
		document.getElementById("spisokPost").style="background-color:red; width:100%;";
		document.getElementById("spisokPost").style.display = 'none';
		document.getElementById("postavshikk").style="background-color:green; width:100%;";		
	}
}

// работа с номером накладной
  function checkGenerate(){
	var chbox;
	chbox=document.getElementById('autoCheck');
	if (chbox.checked) {		
		Data = new Date();
		Year = Data.getFullYear();
		Month = Data.getMonth();
			if ((Month+1).length=1){ Month='0'+(Month+1);}
		Day = Data.getDate();
			if (Day.length<2){ Day='0'+Day;	}
		Hour = Data.getHours();
		Minutes = Data.getMinutes();		
		document.getElementById('numbNakl').value = Day+Month+Year+'--'+Hour+Minutes;		
		alert('Номер накладной сгенерирован'); }
	else {
		alert ('Укажите номер накладной!');
		document.getElementById('numbNakl').value = '';	}
} 

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