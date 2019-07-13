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
include_once("menu_sklad.php");
//echo 'Ты неавторизован. Тебе сюда нельзя! <br>';
/*
echo '<html>
<head>
<META HTTP-EQUIV="Refresh" CONTENT="5; URL=index.php">
</head>
</html>
';*/


}

else{
include_once("header_log.php");
include_once("menu_sklad.php");
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