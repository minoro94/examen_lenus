<?php session_start();
//Validando que si el usuario ya inicio sesion.
    if(isset($_SESSION['usuario'])){
        header('Location: index.php');
    }
    $errores = '';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $usuario  = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
        $password = $_POST['password'];
        $password = hash('sha512', $password);
//Conexion a la db, que lo pude convertir en metodo pero no lo hice D:
        try{
            $conexion = new PDO('mysql:host=localhost;dbname=examen', 'root', '');
        }catch(PDOException $e){
            echo "ERROR: ". $e->getMessage();
        }

        $statement = $conexion->prepare('SELECT * FROM usuarios where usuario = :usuario  AND pass = :pass');
        $statement->execute(array(
            ':usuario' => $usuario,
            ':pass' => $password
        ));

        $resultado = $statement->fetch();
//Si no encuentra nada en la DB te retorna un false, se le asigna la sesion al usuario y te manda al 
//header donde valida si esta iniciado el usuario.
        if($resultado !== false){
            $_SESSION['usuario'] = $usuario;
            header('Location: index.php');
        }else{
            $errores .= '<li>Datos incorrectos</li>';
        }
    }
    require 'views/signin-view.php';
?>