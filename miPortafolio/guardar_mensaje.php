<?php
// Activar errores para depurar
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 1. Conexión a la base de datos
require_once("conexion.php");

// 2. Recibimos los datos usando $_REQUEST para atraparlos sin importar si viajan por POST o GET
$nombre = $_REQUEST['txtnombre'] ?? '';
$correo = $_REQUEST['txtcorreo'] ?? '';
$mensaje = $_REQUEST['txtmensaje'] ?? '';

// Línea de diagnóstico para comprobar que ahora sí los lee
echo "Datos capturados correctamente -> Nombre: <b>$nombre</b> | Correo: <b>$correo</b> | Mensaje: <b>$mensaje</b><br><hr>";

// 3. Preparamos la consulta SQL
$sqlinsert = "INSERT INTO mensajes (nombre, correo, mensaje) VALUES (?, ?, ?)";
$stmt = $conexion->prepare($sqlinsert);

// 4. Vinculamos y ejecutamos
$stmt->bind_param("sss", $nombre, $correo, $mensaje);

if($stmt->execute()){
    header("Location:index.php?estadophp=exito");
    echo "<br><h3 style='color: green;'>¡Mensaje guardado correctamente en la base de datos!</h3>";
    echo "<br><a href='admin.php'>Ir al panel de administración</a>";
} else {
    header("Location:index.php?estadophp=error");
    echo "<br><h3 style='color: red;'>Error al intentar guardar el mensaje: " . $stmt->error . "</h3>";
}
?>