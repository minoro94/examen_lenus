<?php session_start();
if(!isset($_SESSION['usuario'])){
    header('Location: index.php');
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario = $_SESSION['usuario'];
    $passwordactual = $_POST['passwordactual'];
    $passwordnuevo = $_POST['passwordnuevo'];
    $passwordnuevo2 = $_POST['passwordnuevo2'];
    $errores = '';
    if(empty($passwordactual) or empty($passwordnuevo) or empty($passwordnuevo2)){
        $errores .= '<li>Rellena todos los campos</li>';
    }else{
        try{
            $conexion  = new PDO('mysql:host=localhost;dbname=examen', 'root','');
        }catch(PDOException $e){
            echo 'Error: '. $e->getMessage();
        }
        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND pass = :pass');
        $statement->execute(array(
            ':usuario' => $usuario,
            ':pass' => hash('sha512',$passwordactual)
        ));
        $resultado = $statement->fetch();
        if($resultado == false){
            $errores .= '<li>Tu contraseña actual no es la correcta</li>';
        }
        
        $passwordnuevo = hash('sha512', $passwordnuevo);
        $passwordnuevo2 = hash('sha512', $passwordnuevo2);
        if($passwordnuevo != $passwordnuevo2){
            $errores .= '<li>Las contraseñas nuevas no son iguales</li>';
        }
    }
    if($errores == ''){
        $statement = $conexion->prepare('UPDATE usuarios SET pass = :pass WHERE usuario = :usuario');
        $statement -> execute(array(
            ':usuario' => $usuario,
            ':pass' => $passwordnuevo 
        ));
        header('Location: signin.php');
    }
}
require 'views/change-password-view.php';

?>