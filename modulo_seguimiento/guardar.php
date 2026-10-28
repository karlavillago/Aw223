<?php
include "conexion.php";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

function volver($url, $msg, $tipo) {
    header("Location: $url" . (strpos($url, "?") ? "&" : "?") . "tipo=$tipo&msg=" . urlencode($msg));
    exit;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$id          = (int) ($_POST["id_solicitud"] ?? 0);
$estado      = $_POST["estado"] ?? "";
$observacion = trim($_POST["observacion"] ?? "");
$regreso     = "actualizar.php?id=$id";

// Validación en el servidor
if (!in_array($estado, ["En proceso", "Resuelta"])) {
    volver($regreso, "Elige un estado válido.", "error");
}
if (mb_strlen($observacion) < 5) {
    volver($regreso, "La observación debe tener al menos 5 caracteres.", "error");
}

try {
    $conexion->begin_transaction();

    // 1) Guarda el registro de seguimiento
    $stmt = $conexion->prepare("INSERT INTO seguimiento (id_solicitud, estado, observacion, fecha_act)
                                VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("iss", $id, $estado, $observacion);
    $stmt->execute();

    // 2) Actualiza el estado de la solicitud
    $stmt = $conexion->prepare("UPDATE solicitudes SET estado = ? WHERE id_solicitud = ?");
    $stmt->bind_param("si", $estado, $id);
    $stmt->execute();

    $conexion->commit();
    volver("index.php", "Solicitud #$id actualizada correctamente.", "exito");
} catch (Exception $e) {
    $conexion->rollback();
    volver($regreso, "No se pudo guardar. Intenta de nuevo.", "error");
}