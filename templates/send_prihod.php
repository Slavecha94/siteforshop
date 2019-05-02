<a href="sklad.php"> ТЫЫЫЫЫЫЫЫЫЫЫЫЫЫЫЫЫЫЫЫЫЫК </a>

<?php

if (isset($_POST['cell']))
{
?>
<br> <br>
	РАБОТАЕТ !!!! 
<br> <br>
<?php

$cell = $_REQUEST['cell'];

foreach ($cell as $key => $value) {

    echo $cell[$key], '<br>';

}

?>
work
<?php
}else{
?>
no work
<?php	

}
?>