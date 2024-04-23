<?php
$direccionservidor = "localhost"; // dirección del serv
$baseDatos = "sistema";
$usuarioDB = "root";
$contraseniaDB = "";


try {
    $conexion= new PDO('mysql:host='.$direccionservidor.';dbname='.$baseDatos,$usuarioDB,$contraseniaDB);
} catch ( Exception $ex) {
    echo $ex->getMessage(); 
}
?>

