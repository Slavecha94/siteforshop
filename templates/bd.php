<?php
session_start();

$conn = mysqli_connect ("localhost","root","");
mysqli_select_db ($conn,"ourSite" );

if (isset($_SESSION['login']) && isset($_SESSION['password']) && isset($_SESSION['id'])){
$login = $_SESSION['login'];
$password = $_SESSION['password'];
$id_user = $_SESSION['id'];
} 
?>