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
    <title>quejas y sugerencias </title>
</head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <div>
      <img src="cintillo-2022.jpg" alt="cintillo UPTOS">
  </div>
    <!-- BOOTSTRAP:5-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: rgb(35, 35, 117);"> 
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="login.html">Iniciar Seción</a>
        </li>
        <li class="nav-item">
          <li><a class="nav-link" href="qys2.html">Generar Planilla</a></li>
        </li>
        <li class="nav-item">
          <li><a class="nav-link" href="index.php">Generar PDF</a></li>
        </li>
        <li class="nav-item">
          <li><a class="nav-link" href="#">Ver Estadisticas</a></li>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="tabla.php">editar quejas y sugerencias</a>
        </li>
      </li>
      
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<body>
    <br>
    <h1>quejas y sugerencias</h1>
    <br>
    <div class="card">
        <div class="card-header"></div>
        
        <a
            name=""
            id=""
            class="btn btn-primary"
            href="qys.html"
            role="button"
            >registrar  nueva queja o sugerencia</a
        >
        
        <div class="card-body">
           
        <div
            class="table-responsive-sm"
        >
            <table
                class="table table-primary"
            >
                <thead>
                    <tr>
                        <th scope="col">Nombre </th>
                        <th scope="col">apellido</th>
                        <th scope="col">descripcion</th>
                        <th scope="col">tipo</th>
                        <th scope="col">acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_qys as $registro) {?>
                        
                        <tr class="">
                        <td><?php echo $registro['nombre'];?> </td>
                        <td><?php echo $registro['apellido'];?></td>
                        <td><?php echo $registro['descripcion'];?></td>
                        <td><?php echo $registro['tipo'];?></td>
                        <td></td>
                    <?php } ?>
                    
                        
                    
                </tbody>
            </table>
        </div>
        
        

        </div>
       
    </div>
    <br>
</body>
</html>