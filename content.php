<?php session_start();
/*
Con este if valido si hay sesion iniciada ya que de lo contrario se podria acceder al contenido 
desde la URL
*/ 
if(isset($_SESSION['usuario'])){
    require 'views/content-view.php';    
}else{
    header('Location: signin.php');
}

?>