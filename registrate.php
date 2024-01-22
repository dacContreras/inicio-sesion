<!-- iniciamos sesion -->
<?php session_start();

// realizamos una validacion si hay una sesion 
if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
}
// resivimos los datos y revisamos si los datos fueron llenados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // guardamos el usurio y la contraseña
    // usamos el filtro para que no nos inyenten HMTL
    $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    // guardamos los posibles erroes que tengamos
    $errores = '';

    // verificamos que los campos no esten vacios
    if (empty($usuario) or empty($password) or empty($password2)) {
        $errores .= '<li>Por favor rellena todos los datos correctamente</li>';
    } else {
        // comprobar que el usario no exista en la base de datos
        try {
            $conexion = new PDO('mysql:host=localhost;dbname=login_practica', 'root', '');
        } catch (PDOException $e) {
            echo "Error " . $e->getMessage();
        }

        // creamos nuestras consultas
        // traeme todos los campos que sean igual al usuario que le pasemos
        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
        $statement->execute(array(':usuario' => $usuario));
        $resultado = $statement->fetch();
        
        // si el resultado es false el usuario se puede registrar
        // si no lo es, es porque el usuario ya existe y tiene que usar otro usuarios
        if ($resultado != false) {
            $errores .= '<li>El nombre de usuario ya existe</li>';
        }

        // ENCRIPTAMOS LA CONTRASEÑA
        // usamos el algoritmo sha512 y encriptamos la contrseña
        $password = hash('sha512', $password);
        $password2 = hash('sha512', $password2);

        // si la contraseña es diferente a la contraseña dos es porque se confundio
        // y tiene que volver a hacerla y para que sean identicas
        if ($password != $password2) {
            $errores .= '<li>Las Contraseñas no son iguales</li>';
        }
    }

    // si no tenemos ningun tipo de erros es porque ya podemos agregar el usuario
    // a la base de datos ingresando en la columna usuario el usuario y en la columna
    // pass la contraseña y lo podemos redirigir al contenidos
    if ($errores == '') {
        $statement = $conexion->prepare('INSERT INTO usuarios (id, usuario, pass) VALUES (null, :usuario, :pass)');
        $statement->execute(array('usuario' => $usuario, ':pass' => $password));

        header('Location: login.php');
    }
}

require 'views/registrate.view.php';
