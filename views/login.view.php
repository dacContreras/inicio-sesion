<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> no entendi como usarla, pero luego se arreglara no tener miedo XD-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Login</title>
</head>
<!-- pagina de login cuando ya tiene una cuenta -->
<body>
    <div class="contenedor">
        <h1 class="titulo">Iniciar Sesion</h1>
        <hr class="border">
        <!--  -->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="formulario" name="login">
            <!-- cada elemento con la clase form-group -->
            <div class="form-group">
                <i class="icono izquierda material-icons">person</i><input type="text" name="usuario" class="usuario" placeholder="Usuario">
            </div>

            <div class="form-group">
                <i class="icono izquierda material-icons">lock</i><input type="password" name="password" class="password_btn" placeholder="Contraseña"><i class="submit-btn material-icons" onclick="login.submit()">arrow_forward</i>
            </div>
            <!-- si hay erroers los muestra -->
            <?php if (!empty($errores)) : ?>
                <div class="error">
                    <ul>
                        <?php echo $errores; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </form>
        <!-- si no tiene cuenta puede regresar y hacer una -->
        <p class="texto-registrate">
            ¿ No tienes cuenta ?
            <a href="registrate.php">Registrate</a>
        </p>
    </div>
</body>

</html>