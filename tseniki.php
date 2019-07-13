<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title> СОЗДАНИЕ ЦЕННИКОВ </title>
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
include_once("menu_sklad.php");
//echo 'Ты неавторизован. Тебе сюда нельзя! <br>';
?>

<form id="printForm" action="prices_stamp.php" method="POST">
<table class="table table-inverse" id="node">
  <thead>
    <tr>
      <th>№</th>
      <th>ИП</th>
      <th>ДАТА</th>
      <th>НАЗВАНИЕ</th>
	  <th>ИЗМЕРЕНИЕ ЦЕНЫ</th>
      <th>ЦЕНА (ЧИСЛОМ)</th>      
    </tr>
  </thead>	
</table>

<table class="table table-inverse" id="node">
	<tr>
    <td colspan="8"> 
	<button id="addRow" onclick="getStr();" type="button" class="btn btn-success"  style="width:100%;">Добавить строку</button>
	</td>
    </tr>
	<tr>
	<td colspan="8"> 
	<button type="button" onclick="getTable();" class="btn btn-primary" style="width:100%;">ПОСМОТРЕТЬ РЕЗУЛЬТАТ В БЛОКЕ НИЖЕ</button>	
	</td>
	</tr>			
</table>
</form>

<div class="row justify-content-center align-items-center">
	<div class="center form-check">
	<input type="checkbox" class="checkbox" onclick="shadowForm();" id="showForm" value="a"> <span id="showHide">ПОКАЗ ФОРМЫ</span> </input>
  </div>  
  </div>

<hr>

<?php

}else{
include_once("header_log.php");
include_once("menu_sklad.php");	
	
?>

<form id="printForm" action="prices_stamp.php" method="POST">
<table class="table table-inverse" id="node">
  <thead>
    <tr>
      <th>№</th>
      <th>ИП</th>
      <th>ДАТА</th>
      <th>НАЗВАНИЕ</th>
	  <th>ИЗМЕРЕНИЕ ЦЕНЫ</th>
      <th>ЦЕНА (ЧИСЛОМ)</th>
    </tr>
  </thead>	
</table>

<table class="table table-inverse" id="node">
	<tr>
    <td colspan="8"> 
	<button id="addRow" onclick="getStr();" type="button" class="btn btn-success"  style="width:100%;">Добавить строку</button>
	</td>
    </tr>	
	<tr>
	<td colspan="8"> 
	<button type="button" onclick="getTable();" class="btn btn-primary" style="width:100%;">ПОСМОТРЕТЬ РЕЗУЛЬТАТ В БЛОКЕ НИЖЕ</button>	
	</td>
	</tr>			
</table>
</form>

<div class="row justify-content-center align-items-center">
	<div class="center form-check">
	<input type="checkbox" class="checkbox" onclick="shadowForm();" id="showForm" value="a"> <span id="showHide">ПОКАЗ ФОРМЫ</span> </input>
  </div>  
  </div>

<hr>


<?php
}
?>

<script>

function shadowForm(){
	var chbox;
	chbox=document.getElementById('showForm');
	if (chbox.checked) {
		document.getElementById('printForm').style='display:block;'; 
		document.getElementById('showHide').innerHTML = 'ПОКАЗ ФОРМЫ';				
	}
	else {		
		document.getElementById('printForm').style= 'display:none;';
		document.getElementById('showHide').innerHTML = 'СКРЫТИЕ ФОРМЫ. ДЛЯ ПЕЧАТИ НАЖМИТЕ "CTRL+P"';
		
	}
}


var table = document.getElementById('node');

function getTable(){

var rows = table.rows.length;

for (var i =1; i<= rows; i++){		
	
	var newElem=document.createElement('table');
	newElem.id=i+'table';	
	document.body.appendChild(newElem);
	document.getElementById(i+'table').style='float:left; width:33%; display:inline-block;';	
   
	// ИП
	var newRow =newElem.insertRow(0);
	var newCell=newRow.insertCell(0);   
	newCell.id=i+'tl1';	
	newCell.innerHTML=table.rows.item(i).cells[1].childNodes[1].value;
	document.getElementById(i+'tl1').style="width:200px; height: 0.8cm; text-align:center;font-size:14px; border:1px solid black;";	
   
	// ДАТА
	var newCell = newRow.insertCell(1);
	newCell.id=i+'tl2';		
	newCell.innerHTML=table.rows.item(i).cells[2].childNodes[1].value; 
	document.getElementById(i+'tl2').style="width:200px; height: 0.8cm; text-align:center;font-size:16px; border:1px solid black;";	

	// описание
	var newRow=newElem.insertRow(1);
	var newCell = newRow.insertCell(0);
	newCell.id=i+'t21';	
	newCell.colSpan = 2;
	newCell.innerHTML=table.rows.item(i).cells[3].childNodes[1].value;	
	document.getElementById(i+'t21').style="width:400px; height: 1.5cm; text-align:center; font-size:24px; border:1px solid black; font-weight:bold;";	
	
	// измерение цены
	var newRow=newElem.insertRow(2);
	var newCell = newRow.insertCell(0);
	newCell.id=i+'t31';	
	newCell.innerHTML=table.rows.item(i).cells[4].childNodes[1].value;
	document.getElementById(i+'t31').style="width:200px; height: 1.5cm; text-align:center; font-size:30px; border:1px solid black;";	
	
	// цена
	var newCell = newRow.insertCell(1);
	newCell.id=i+'t32';   
	newCell.innerHTML=table.rows.item(i).cells[5].childNodes[1].value+' РУБ.';
	document.getElementById(i+'t32').style="width:200px; height: 2cm;text-align:center; font-size:32px; border:1px solid black; font-weight:bold;";	

	document.body.appendChild(newElem);   
}
}

//добавление строки
var inc=0;
var countRow=0;
function getStr() {   
	var row = document.createElement("tr");
	inc=inc+1;
	countRow=countRow+1;
    row.innerHTML = 
	  "<tr id='STRING_PR'><td> <input type='text' id='NUMB' 	name='cells["+inc+parseInt(1)+"]'	class='form-control'	id='numbStr' 	value="+inc+" style='width:40%'> </td>"+
      "<td> <input type='text' id='IP' 		name='cell["+inc+parseInt(2)+"]' 	class='form-control' 	id='IP' 		value='ИП АЛФЕРОВА А.Д.' readonly> </td>"+
      "<td> <input type='text' id='DATE' 	name='cell["+inc+parseInt(3)+"]' 	class='form-control' 	id='DATE' 		value='<?php echo date("d.m.Y");?>' readonly> </td>"+
	  "<td> <input type='text' id='OPISANIE' name='cell["+inc+parseInt(4)+"]' 	class='form-control' 	id='OPISANIE' 	value='OPISANIE'> </td>"+
	  "<td> <input type='text' id='NAME' 	name='cell["+inc+parseInt(5)+"]' 	class='form-control' 	id='NAME'		value='Цена за 1 кг.'> </td>"+
	  "<td> <input type='text' id='PRICE' 	name='cell["+inc+parseInt(6)+"]' 	class='form-control' 	id='PRICE' 		value='0'> </td></tr>";
    document.getElementById("node").appendChild(row);	
}
</script>



</body>
</html>