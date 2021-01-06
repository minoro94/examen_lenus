<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambia tu Contraseña</title>
</head>
<body>
    <div>
        <h1>Cambia tu Contraseña</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <input type="password" name="passwordactual" placeholder="Contraseña Actual">
            <br>
            <input type="password" name="passwordnuevo" placeholder="Contraseña Nueva">
            <br>
            <input type="password" name="passwordnuevo2" placeholder="Repetir Contraseña Nueva">
            <br>
            <input type="submit" value="Cambiar Contraseña">
            <?php if(!empty($errores)): ?>
                <?php echo $errores ?>
            <?php endif; ?>
        </form>
            <p><h2>Si el cambio de contraseña resulta exitoso te mantendras en tu sesion iniciada, solo cierra sesion y comprueba el cambio de contraseña.</h2></p>
            <a href="content.php">Regresar</a>
    </div>
</body>
</html>