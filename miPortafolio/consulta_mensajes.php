<?php
// 1. Conexión a la base de datos
require_once("conexion.php");

// 2. Preparamos la consulta SQL
$selectMsj = "SELECT * FROM mensajes";
try {
   $rsMsj = $conexion->query($conexion, $selectMsj);
   mysqli_close($conexion);
   return $rsMsj;


} catch (Exception $e) {
    die("Error al consultar los mensajes: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Mensajes</title>
</head>
<body>
    <h1>Consulta de Mensajes</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Mensaje</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['correo']; ?></td>
                <td><?php echo $row['mensaje']; ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>