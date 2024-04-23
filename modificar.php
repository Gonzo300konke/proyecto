<?php
   include_once ("conexcion.php");
    $id = $_GET['id']; // Asegúrate de validar y sanitizar este valor

    // Recuperar los valores actuales del registro desde la base de datos
    $sql = "SELECT * FROM qys WHERE id = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $registro = $stmt->fetch(PDO::FETCH_ASSOC);

    // Procesar el formulario cuando se envía
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los nuevos valores del formulario
        $nuevoNombre = $_POST['nombre'];
        $nuevoApellido = $_POST['apellido'];
        $nuevaCedula = $_POST['cedula'];
        $nuevaDireccion = $_POST['direccion'];
        $nuevaArea = $_POST['area'];
        $nuevoTipo = $_POST['tipo']; // Nuevo campo para el tipo
        $nuevaDescripcion = $_POST['descripcion'];

        // Actualizar el registro en la base de datos
        $sqlActualizar = "UPDATE qys SET
            nombre = :nombre,
            apellido = :apellido,
            cedula = :cedula,
            direccion = :direccion,
            area = :area,
            tipo = :tipo,
            descripcion = :descripcion
            WHERE id = :id";

        $stmtActualizar = $conexion->prepare($sqlActualizar);
        $stmtActualizar->bindParam(':nombre', $nuevoNombre);
        $stmtActualizar->bindParam(':apellido', $nuevoApellido);
        $stmtActualizar->bindParam(':cedula', $nuevaCedula);
        $stmtActualizar->bindParam(':direccion', $nuevaDireccion);
        $stmtActualizar->bindParam(':area', $nuevaArea);
        $stmtActualizar->bindParam(':tipo', $nuevoTipo); // Vincular el nuevo campo
        $stmtActualizar->bindParam(':descripcion', $nuevaDescripcion);
        $stmtActualizar->bindParam(':id', $id, PDO::PARAM_INT);
        $stmtActualizar->execute();

        // Redirigir al usuario a otra página (por ejemplo, index.php)
        header('Location: index.php');
        exit;
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<h1>Editar Registro</h1>
    <form method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $registro['nombre']; ?>"><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="<?php echo $registro['apellido']; ?>"><br>

        <label for="cedula">Cédula:</label>
        <input type="text" id="cedula" name="cedula" value="<?php echo $registro['cedula']; ?>"><br>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" value="<?php echo $registro['direccion']; ?>"><br>

        <label for="area">Área:</label>
        <input type="text" id="area" name="area" value="<?php echo $registro['area']; ?>"><br>

        <label for="tipo">Tipo:</label>
        <select id="tipo" name="tipo">
            <option value="queja" <?php if ($registro['tipo'] === 'queja') echo 'selected'; ?>>Queja</option>
            <option value="sugerencia" <?php if ($registro['tipo'] === 'sugerencia') echo 'selected'; ?>>Sugerencia</option>
        </select><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion"><?php echo $registro['descripcion']; ?></textarea><br>

<input type="submit" value="Guardar cambios">
</form>
</body>
</html>
    

    

