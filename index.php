<!-- Si no hay sesion iniciada te redirecciona al contenido si no, te envia a registrarte. -->
<?php session_start();
    if(isset($_SESSION['usuario'])){
        header('Location: content.php');
    }else{
        header('Location: register.php');   
    }
?>