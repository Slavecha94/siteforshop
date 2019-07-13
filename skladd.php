<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title> ПРИХОД ТОВАРА </title>
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

<form method="POST" action="send_prihod.php" style="width:90%;margin-left:50px;">
 <h1 class="center display-4 "> Приход товара </h1> 
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
    <input type="text" name="cell[1]" class="form-control" id="postavshikk" style="background-color:green;" required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput3">Покупатель</label>
    <input type="text" name="cell[2]" class="form-control" id="formGroupExampleInput3" value="ИП Алферова А.Д." disabled>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput4">Склад</label>
    <input type="text" name="cell[3]" class="form-control" id="formGroupExampleInput4" value="Основной склад" disabled required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput5">Номер накладной</label>
    <input type="text" name="cell[4]" class="form-control" id="numbNakl" value="" required>
	
	<div class="row h-100 justify-content-center align-items-center">
	<div class="center form-check">
	<input type="checkbox" class="checkbox" onclick="checkGenerate();" id="autoCheck">Сгенерировать автоматически	 
  </div>  
  </div>  
  </div>  
  <div class="form-group">
    <label for="formGroupExampleInput6">Оформитель прихода</label>
    <input type="text" name="cell[5]" class="form-control" id="formGroupExampleInput4" value="<?php echo $login; ?>" readonly>
  </div>
  
  <div class="form-group">
    <label for="formGroupExampleInput7">Дата прихода</label>
    <input type="text" name="cell[6]" class="form-control" id="formGroupExampleInput4" value="<?php  
	$time = time()+25200;								
	$timeNow=date("Y-m-d H:i:s",$time);
	echo $timeNow;
?>  " readonly>
  </div>
  
    <div class="form-group">
    <label for="formGroupExampleInput6">Наша накрутка</label>
    <input type="number" name="cells[7]" id="ourUp" class="form-control" min="20" max="50" value="25" required>
  </div>
  <hr>  
<table class="table table-inverse" id="node">
  <thead>
    <tr>
      <th style="width:10%">№</th>
      <th>Категория</th>
      <th>Товар</th>
      <th>Кол-во</th>
	  <th>Ед. изм.</th>
      <th>Цена (закуп) за 1 ед.</th>
      <th>Цена (наша) за 1 ед.</th>
      <th>Сумма (закуп)</th>
	  <th>Сумма (наша)</th>
    </tr>
  </thead>	
</table>
<table class="table table-inverse" id="node">

<tr>
    <th style="width:32%;" > <input type="text" class="form-control" id="formGroupExampleInput5" value="Общее кол-во" style="background-color:yellow;"></th>
    <td style="width:11%;"> 
		<input type="text" class="form-control" name="cell[8]" id="sum_kolvo" name="kol_prix" disabled>
	</td>      
	<td style="width:11%"> 
		<input type="text" class="form-control" name="" value="Итого" style="background-color:yellow;"> 
	</td>      
	<td style="width:11%"> 
		<input type="text" class="form-control" name="cell[9]" id="sum_zakup" disabled> 
	</td>
	<td style="width:11%"> 
		<input type="text" class="form-control" name="cell[10]" id="sum_our" disabled> 
	</td>
	<td style="width:11%"> 
		<input type="text" class="form-control" name="cell[11]" id="sum_itogZak" disabled> 
	</td>      
	<td style="width:11%"> 
		<input type="text" class="form-control" id="sum_itogOur" disabled> 
	</td>      	  	  	  
    </tr>          
	<tr>
       <td colspan="8"> <button id="addRow" onclick="getStr();" type="button" class="btn btn-success"  style="width:100%;">Добавить строку</button></td>
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
include_once("menu_sklad.php");
}
?>

<script>
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
		document.getElementById('numbNakl').value = Day+Month+Year+'/'+Hour+Minutes;		
		alert('Номер накладной сгенерирован'); }
	else {
		alert ('Укажите номер накладной!');
		document.getElementById('numbNakl').value = '';	}
} 

function nakrutka(){
var inp = document.getElementsByTagName('input');
var countUp=0;
for(var i=0; i<inp.length; i++){
	if(inp[i].id=="ourUp"){ 
	upUp=parseInt(inp[i].value);
	alert('Накрутка составляет '+upUp);}
	} 
}
</script>



<script>
// расчет количества
function sumKolvo(){

var inp = document.getElementsByTagName('input');
var table = document.getElementById("node");
var rows = table.rows.length;
var kolvoGoods=0;													// сумма кол-ва товара
var allPriceZakup=0;												// общая цена (закуп)
var allOurPrice=0;													// общая цена (наша)
var sumPriceZakup=0;												// общая сумма (закуп)
var sumOurPrice=0;													// общая сумма (наша)
var countUp=0;

for(var k=0; k<inp.length; k++){
	if(inp[k].id=="ourUp"){ 
	upUp=(parseInt(inp[k].value))/100;}
	} 

for (var i =1; i<= rows; i++)
	{	
		table.rows.item(i).cells[6].childNodes[1].value = table.rows.item(i).cells[5].childNodes[1].value * (1+upUp);		
		table.rows.item(i).cells[7].childNodes[1].value = table.rows.item(i).cells[5].childNodes[1].value * table.rows.item(i).cells[3].childNodes[1].value;
		table.rows.item(i).cells[8].childNodes[1].value = table.rows.item(i).cells[6].childNodes[1].value * table.rows.item(i).cells[3].childNodes[1].value;
		
		kolvoGoods=kolvoGoods+parseFloat(table.rows.item(i).cells[3].childNodes[1].value);		
		document.getElementById('sum_kolvo').value = kolvoGoods; 	// общее количество товара
		
		allPriceZakup=allPriceZakup+parseFloat(table.rows.item(i).cells[5].childNodes[1].value);		
		document.getElementById('sum_zakup').value = allPriceZakup; 	// общая цена (закуп)
		
		allOurPrice=allOurPrice+parseFloat(table.rows.item(i).cells[6].childNodes[1].value);		
		document.getElementById('sum_our').value = allOurPrice; 	// общая цена (закуп)
		
		sumPriceZakup=sumPriceZakup+parseFloat(table.rows.item(i).cells[7].childNodes[1].value);		
		document.getElementById('sum_itogZak').value = sumPriceZakup; 	// общая цена (закуп)
		
		sumOurPrice=sumOurPrice+parseFloat(table.rows.item(i).cells[8].childNodes[1].value);		
		document.getElementById('sum_itogOur').value = sumOurPrice; 	// общая цена (закуп)
	};
}


</script> 

<script>
var inc=0;
var countRow=0;
function getStr() {   
	var row = document.createElement("tr");
	inc=inc+1;
	countRow=countRow+1;
    row.innerHTML = 
	  "<td> <input type='text' name='cells["+inc+parseInt(11)+"]' class='form-control' id='numbStr' value="+inc+" style='width:40%'> </td>"+
      "<td> <input type='text' name='cell["+inc+parseInt(12)+"]' class='form-control' id='category'> </td>"+
      "<td> <input type='text' name='cell["+inc+parseInt(13)+"]' class='form-control' id='nameTov'> </td>"+
	  "<td> <input type='text' onkeyup='sumKolvo();' name='cell["+inc+parseInt(14)+"]' class='form-control' id='kolvo' value='0'> </td>"+
	  "<td> <input type='text' name='cell["+inc+parseInt(15)+"]' class='form-control' id='edIzm'> </td>"+
	  "<td> <input type='text' onkeyup='sumKolvo();' name='cell["+inc+parseInt(16)+"]' class='form-control' id='zakPrice' value='0'> </td>"+
	  "<td> <input type='text' onkeyup='sumKolvo();' name='cell["+inc+parseInt(17)+"]' class='form-control' id='ourPrice' value='0' readonly> </td>"+
	  "<td> <input type='text' onkeyup='sumKolvo();' name='cells["+inc+parseInt(18)+"]' class='form-control' id='sumItogZak' value='0' disabled> </td>"+
	  "<td> <input type='text' onkeyup='sumKolvo();' name='cells["+inc+parseInt(19)+"]' class='form-control' id='sumItogOur' value='0' disabled> </td>";
    document.getElementById("node").appendChild(row);	
}
</script>

<?php

include_once("footer.php");

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