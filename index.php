<!-- COMENTARIO SOBRE LA BASE DE DATOS CON LOS DATOS QUE DEBE LLEVAR -->
<!-- 
    La base de datos tiene que llamrase "login_practica"
    tiene que tener una tabla "usuarios" con las sigueintes columnas
    1. id = INT AUTO INCREMENT PRIMARY KEY
    2. usuario = VARCHAR 50
    3. pass = VARCHAR 200
 -->
<!-- hacemos una comprobacion -->

<?php session_start();

// verificamos si el usuarios esta registrado al momento de entrar
if(isset($_SESSION['usuario'])){
    header('Location: contenido.php');
} else {
    header('Location: registrate.php');
}