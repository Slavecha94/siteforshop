<!DOCTYPE html>
<html lang="en">
  <head>    
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
<html>
	<head>
		<title>Наш сайт: Главная</title>		
		<link rel="stylesheet" type="text/css" href="styles/style.css" />		
	</head>
	
    
<?php
include_once("bd.php");

if(empty($login) and empty($password)){
	
include_once("header_notlog.php");
include_once("contentNotAuth.php");
include_once("footer.php");
}

else{
include_once("header_log.php");
include_once("contentAuth.php");
include_once("footer.php");
}
?>
	
</body>
</html>