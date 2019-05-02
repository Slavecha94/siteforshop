<?php
    include_once("bd.php");
	echo 'verif start';
	
    if (isset($_POST['submit'])){
		if(empty($_POST['login']))  {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введите логин!"> Введите логин! </font>';
		} 
		else if (!preg_match("/^\w{3,}$/", $_POST['login'])) {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="В поле "Логин" введены недопустимые символы!"> В поле "Логин" введены недопустимые символы! Только буквы, цифры и подчеркивание!</font>';
		}
		else if(empty($_POST['password'])) {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введите пароль !"> Введите пароль!</font>';
		}
		else if (!preg_match("/\A(\w){6,20}\Z/", $_POST['password'])) {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Пароль слишком короткий!"> Пароль слишком короткий! Пароль должен быть не менее 6 символов! </font>';
		}
		else if(empty($_POST['password2'])) {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введите подтверждение пароля!"> Введите подтверждение пароля!</font>';
		}
		else if($_POST['password'] != $_POST['password2']) {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введенные пароли не совпадают!"> Введенные пароли не совпадают!</font>';
		}
		else if(empty($_POST['email'])) {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введите E-mail!">Введите E-mail! </font>';
		}
		else if (!preg_match("/^[a-zA-Z0-9_\.\-]+@([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,6}$/", $_POST['email'])) {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="E-mail имеет недопустимий формат!"> E-mail имеет недопустимий формат! Например, name@gmail.com! </font>';
		}
		 
		else{
			$login = $_POST['login'];
			$password = $_POST['password'];
			$mdPassword = md5($password);
			$password2 = $_POST['password2'];
			$email = $_POST['email'];
			$regdate = date("d-m-Y в H:i");
			$name = $_POST['name'];
			$lastname = $_POST['lastname'];  
			echo 'regdate - '.$regdate;

	$query = $mysqli->query( "SELECT id FROM userss WHERE login='$login'");
			if ($query == true){
					echo "user naiden";
				}else{
					echo "user ne naiden";
				}
					
			if ($query->num_rows>0){
			echo '<font color="red">Пользователь с таким логином зарегистрирован!</font>'
			}
									
			else {
				$query2 =$mysqli->query ("SELECT id FROM userss WHERE email='$email'");
				if ($query2 == true){
					echo "user naiden";
				}else{
					echo "user ne naiden";
				}				
				if ($query->num_rows>0){
					echo '<font color="red"> Пользователь с таким e-mail уже зарегистрирован!</font>';
				}
				
				else{
					$query3 =$mysqli->query( "INSERT INTO userss (login, password, email, reg_date, name_user, lastname )
							  VALUES ('$login', '$mdPassword', '$email', '$regdate', '$name', '$lastname')";					
	//				
				if ($query3 == true){
					echo '<font color="green"> Вы успешно зарегистрировались!</font><br><a href="index.php">На главную</a>';
				}else{
					echo "Error register";
				}												
				}
			}
		}
    }
?>