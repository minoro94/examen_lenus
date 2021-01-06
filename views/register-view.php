<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>
</head>
<body>
    <div>
        <h1>Registrate</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="login">
            <input type="text" name="usuario" placeholder="Usuario">
            <br>
            <input type="password" name="password" placeholder="Contraseña">
            <br>
            <input type="password" name="password2" placeholder="Repetir Contraseña">
            <br>
            <input type="submit" value="Registrarte">
            <?php if(!empty($errores)): ?>
                <?php echo $errores ?>
            <?php endif; ?>
        </form>
        <p>¿Tienes una Cuenta?</p>
            <a href="signin.php">Iniciar Session</a>
    </div>
</body>
</html>