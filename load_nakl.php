<html>
<head>

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>	
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/fontawesome.js"></script>
	<link rel="stylesheet" href="css/main.css">
</head>
</body>

<?php
 $path = 'files/naklads';   // Папка с изображениями
   
foreach (glob("$path/*.*") as $docFile) {
   echo ' <table><tr><td> <img src='.$docFile.'/><br>'.$docFile;
}



?>

</body>
</html>