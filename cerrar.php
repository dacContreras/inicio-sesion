<!-- iniciamos sesion -->
<?php session_start();

// destruimos la sesion
session_destroy();
$_SESSION = array();

// redirigmos a login
header('Location: login.php');

// matamos la pagina
die();