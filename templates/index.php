<!DOCTYPE html>
<html lang="en">
  <head>    
		<link rel="stylesheet" type="text/css" href="styles/style.css" />
<html>
	<head>
		<title>Index</title>		
		<link rel="stylesheet" type="text/css" href="styles/style.css" />		
	</head>
	
    
<?php
include_once("bd.php");

if(empty($login) and empty($password)){
	
include_once("header_notlog.php");

include_once("contentNotAuth.php");
}

else{
echo "<center>Привет, <strong>".$login."</strong> | <a href='exit.php'>Выход</a><br/><a href='firstsql.php'>Контент для зарегистрированных пользователей ! 
</center></br>" ;
include_once("header_log.php");
include_once("contentAuth.php");
}
?>
<?php 

include_once("footer.php");

?>

	
</body>
</html>