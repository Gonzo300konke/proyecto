<?php
include_once ("conexcion.php");
echo $baseDatos;
$sentencia=$conexion->prepare("SELECT * FROM `qys`");
$sentencia->execute();
$lista_qys=$sentencia-> fetchAll (PDO::FETCH_ASSOC);

//print_r($lista_qys);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
  <div>
      <img src="cintillo-2022.jpg" alt="cintillo UPTOS">
  </div>
    <!-- BOOTSTRAP:5-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: rgb(35, 35, 117);"> 
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
      </ul>
      
    </div>
  </div>
</nav>
</head>
<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/cabecera.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
<body>
<form action="validar.php" method="post">

<h1 class="animate__animated animate__backInLeft">incio de sesion</h1>

<p>Usuario <input type="text" placeholder="ingrese su nombre" name="usuario"></p>

<p>Contraseña <input type="password" placeholder="ingrese su contraseña" name="contraseña"></p>

<input type="submit" value="Ingresar">
        </body>
    </html>