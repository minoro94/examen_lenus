<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia Sesion</title>
</head>
<body>
    <div>
        <h1>Inicia Sesion</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="login">
            <input type="text" name="usuario" placeholder="Usuario">
            <br>
            <input type="password" name="password" placeholder="Contraseña">
            <br>
            <input type="submit" value="Inicia Sesion">
            <?php if(!empty($errores)): ?>
            <?php echo $errores; ?>
            <?php endif; ?>
        </form>
        <p>¿Aun no tienes cuenta?</p>
            <a href="register.php">Registrate</a>
    </div>
</body>
</html>