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
    <title>Registrate</title>
</head>

<!-- pagina de registro -->
<body>
    <div class="contenedor">
        <h1 class="titulo">Registrate</h1>
        <hr class="border">
        <!-- agregamos php para dirigir a la pagina -->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="formulario" name="login">
            <!-- cada div con las clase form-group, es un input del formulario -->
            <div class="form-group">
                <i class="icono izquierda material-icons">person</i><input type="text" name="usuario" class="usuario" placeholder="Usuario">
            </div>

            <div class="form-group">
                <i class="icono izquierda material-icons">lock</i><input type="password" name="password" class="password" placeholder="Contraseña">
            </div>

            <div class="form-group">
                <!-- el boton es un boton falso, pero con el uso de javascript le damos la funcionalidad como si fuera un boton de tipo submit -->
                <i class="icono izquierda material-icons">lock</i><input type="password" name="password2" class="password_btn" placeholder="Repite Contraseña"><i class="submit-btn material-icons" onclick="login.submit()">arrow_forward</i>
            </div>
            <!-- este codigo muestra si cometiste un error al crear tu usuario -->
            <!-- revisa si hay errores, en caso de que si, agrega un ul y agrega el error -->
            <?php if(!empty($errores)): ?>
                <div class="error">
                    <ul>
                        <?php echo $errores;?>
                    </ul>
                </div>
            <?php endif; ?>
        </form>
        <!-- si ya tiene cuenta puede ir e ingresar directamente -->
        <p class="texto-registrate">
            ¿ Ya tienes cuenta ?
            <a href="login.php">Iniciar Sesion</a>
        </p>
    </div>
</body>

</html>