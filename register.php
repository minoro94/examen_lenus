<?php session_start();
if(isset($_SESSION['usuario'])){
    header('Location: index.php');
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Limpio y mando en minuscula al usuario
    $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    //Variable en la que capturo errores.
    $errores = '';
    //Compruebo que todos los campos esten completos
    if(empty($usuario) or empty($password) or empty($password2)){
        $errores .= '<li>Rellena todos los campos</li>';
    }else{
        try{
            //Conexion simplre a la DB
            $conexion  = new PDO('mysql:host=localhost;dbname=examen', 'root','');
        }catch(PDOException $e){
            echo 'Error: '. $e->getMessage(); 
        }
        //Con este Query compruebo si el usuario que quiero registrar ya existe en la DB.
        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
        $statement->execute(array(
            ':usuario' => $usuario
        ));
        $resultado = $statement->fetch();
        if($resultado != false){
            $errores .= '<li>El nombre del usuario ya existe</li>';
        }
        //Seguridad simple utilizanso hasheo.
        $password = hash('sha512', $password);
        $password2 = hash('sha512', $password2);
        //compruebo que las contras sean iguales.
        if($password != $password2){
            $errores .= '<li>Las contraseñas no son iguales</li>';
        }
        

    }
//Si la variable errores no contiene nada procede a insertar los datos a la DB.
    if($errores == ''){
        $statement = $conexion->prepare('INSERT INTO usuarios (id, usuario, pass) values (null, :usuario, :pass)');
        $statement-> execute(array(
            ':usuario'=>$usuario,
             ':pass'=>$password
            ));
            header('Location: signin.php');
    }
}
require 'views/register-view.php';
?>