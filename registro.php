<?php
include_once ("conexcion.php");

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $errores=array();
    print_r($_POST);
    $nombres=(isset($_POST['nombres'])) ? $_POST['nombres'] : NULL;
    $apellidos=(isset($_POST['apellidos'])) ? $_POST['apellidos'] : NULL;
    $email=(isset($_POST['email'])) ? $_POST['email'] : NULL;
    $password=(isset($_POST['password'])) ? $_POST['password'] : NULL;
    $id_cargo=(isset($_POST['id_cargo'])) ? $_POST['id_cargo'] : NULL;
    $username=(isset($_POST['username'])) ? $_POST['username'] : NULL;
    
    
    if(empty($nombres)){
        $errores['nombres']="vuelva rellene el campo de nombres";
    }
    if(empty($apellidos)){
        $errores['apellidos']="vuelva rellene el campo de apellidos";
    }
    if(empty($email)){
        $errores['email']="vuelva rellene el campo del email";
    }
    if(empty($username)){
        $errores['username']="vuelva rellene el campo de usuario";
    }
    if(empty($password)){
        $errores['password']="vuelva rellene el campo de contraseña";
    }
    print_r($errores);
    
        
        
 
    if(empty($errores)){
        try {

            $pdo=new PDO('mysql:host='.$direccionservidor.';dbname='.$baseDatos,$usuarioDB,$contraseniaDB);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $sql="INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `email`, `password`, `username`, `id_cargo`)  
            VALUES (NULL,:nombres,:apellidos,:email,:password,:username,:id_cargo);";
    
            $resuldado=$pdo->prepare($sql);
            $resuldado->execute(array(
                ':nombres'=>$nombres, 
                ':apellidos' =>$apellidos,  
                ':email' =>$email,  
                ':password' =>$password,
                ':username' =>$username,
                ':id_cargo' =>$id_cargo
            ));
            
    
            
           
            
        } catch (PDOException $e) {
            echo 'Error en la conexión: ' . $e->getMessage();
        }
    }
    else{
        echo "verifica los campos vacios";
    }

  
}
?>