<?php
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
session_start();
$_SESSION['usuario'] = $usuario;

$conexion = mysqli_connect("localhost", "root", "", "sistema");

$consulta = "SELECT * FROM usuarios WHERE username = '$usuario' AND password = '$contraseña'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_fetch_array($resultado);

if ($filas['id_cargo'] == 1) { // Administrador
    header("location: admin.php");
} elseif ($filas['id_cargo'] == 2) { // Cliente
    header("location: cliente.php");
} else {
    // Mostrar mensaje de error y redirigir al inicio de sesión
    include("index.html");
    echo "<h1 class='bad'>ERROR EN LA AUTENTIFICACIÓN</h1>";
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>
