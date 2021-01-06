<?php session_start();
//destruimos la sesion
session_destroy();
//Esto es nomas por si las dudas, le decimos que la sesion sea un arreglo vacio.
$_SESSION = array();
header('Location: signin.php');
die();
?>