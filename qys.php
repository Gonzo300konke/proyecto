<?php
include_once("conexcion.php");
if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    print_r( $_POST );
    $nombre=(isset($_POST['nombre'])) ? $_POST['nombre'] : NULL;
    $apellido=(isset($_POST['apellido'])) ? $_POST['apellido'] : NULL;
    $cedula=(isset($_POST['cedula'])) ? $_POST['cedula'] : NULL;
    $direccion=(isset($_POST['direccion'])) ? $_POST['direccion'] : NULL;
    $area=(isset($_POST['area'])) ? $_POST['area'] : NULL;
    $tipo=(isset($_POST['tipo'])) ? $_POST['tipo'] : NULL;
    $descripcion=(isset($_POST['descripcion'])) ? $_POST['descripcion'] : NULL;

    echo $baseDatos;
    try{
        $pdo=new PDO('mysql:host='.$direccionservidor.';dbname='.$baseDatos,$usuarioDB,$contraseniaDB);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql="INSERT INTO `qys` (`id`, `nombre`, `apellido`, `cedula`, `direccion`, `area`, `tipo`, `descripcion`) 
        VALUES (NULL, :nombre, :apellido, :cedula, :direccion, :area, :tipo, :descripcion);";
        
        $resuldado=$pdo->prepare($sql);
        $resuldado->execute(array(
            ':nombre'=>$nombre, 
            ':apellido' =>$apellido,  
            ':cedula' =>$cedula,  
            ':direccion' =>$direccion,
            ':area' =>$area,
            ':tipo' => $tipo,
            ':descripcion' =>$descripcion
        ));

    } catch(PDOException $e){
        echo 'Error en la conexión: ' . $e->getMessage();

    }


    

}


?>