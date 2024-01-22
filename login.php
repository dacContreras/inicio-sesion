<!-- iniciamos la sesion -->
<?php session_start();

// realizamos una validacion si hay una sesion 
if (isset($_SESSION['usuarios'])) {
    header('Location: index.php');
}

// guardamos los posibles erroes que tengamos
$errores = '';

// si el metodo de envio es igual a post es poqeu los datos han sido enviados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // pasamos el usuarios y agregamos los filtros para que no nos inyecten codigo
    $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // pasamos la contraseña y la hasheamos o encriptamos
    $password = $_POST['password'];
    $password = hash('sha512', $password);

    // nos conectamos a la base de datos
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=login_practica', 'root', '');
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // consulta: seleccione a todos los usuarios donde el usuario
    // el mismo que le pasamos
    $statement = $conexion->prepare(
        'SELECT * FROM usuarios WHERE usuario = :usuario AND pass = :password'
    );
 
    $statement->execute(array(
        ':usuario' => $usuario,
        ':password' => $password
    ));

    // guardamos el resultados
    $resultado = $statement->fetch();

    // revisamos el resutlaod, si el resultado es diferente a false, lo mandamos
    // a index.php
    // si no agregamos el mensaje que algo hizo mal
    if ($resultado !== false) {
        $_SESSION['usuario'] = $usuario;
        header('Location: index.php');
    } else {
        $errores .= '<li>Datos Incorrectos</li>';
    }
}

require 'views/login.view.php';
