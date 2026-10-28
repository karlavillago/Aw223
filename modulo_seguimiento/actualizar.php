<?php
include "conexion.php";

$id = (int) ($_GET["id"] ?? 0);

// Datos de la solicitud
$stmt = $conexion->prepare("SELECT s.id_solicitud, u.nombre AS usuario, e.nombre AS equipo,
                                   s.descripcion, s.estado
                            FROM solicitudes s
                            JOIN usuarios u ON u.id_usuario = s.id_usuario
                            JOIN equipos e ON e.id_equipo = s.id_equipo
                            WHERE s.id_solicitud = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$solicitud = $stmt->get_result()->fetch_assoc();

if (!$solicitud) {
    header("Location: index.php?tipo=error&msg=" . urlencode("La solicitud no existe."));
    exit;
}

// Historial de atención
$stmt = $conexion->prepare("SELECT estado, observacion, fecha_act
                            FROM seguimiento WHERE id_solicitud = ?
                            ORDER BY id_seguimiento DESC");
$stmt->bind_param("i", $id);
$stmt->execute();
$historial = $stmt->get_result();

$msg  = $_GET["msg"] ?? "";
$tipo = ($_GET["tipo"] ?? "") === "error" ? "error" : "exito";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Actualizar solicitud</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
  <header>
    <h1>Soporte Técnico</h1>
    <p>Actualizar solicitud</p>
  </header>

  <nav>
    <a href="#">Inicio</a>
    <a href="#">Usuarios y equipos</a>
    <a href="#">Solicitudes</a>
    <a href="index.php" class="activo">Seguimiento</a>
  </nav>

  <main>
    <div id="aviso" data-msg="<?= h($msg) ?>" data-tipo="<?= $tipo ?>"></div>

    <a class="boton-claro" href="index.php">← Volver a la lista</a>
    <h2>Solicitud #<?= $solicitud["id_solicitud"] ?></h2>

    <div class="tarjeta">
      <p><strong>Usuario:</strong> <?= h($solicitud["usuario"]) ?></p>
      <p><strong>Equipo:</strong> <?= h($solicitud["equipo"]) ?></p>
      <p><strong>Problema:</strong> <?= h($solicitud["descripcion"]) ?></p>
      <p><strong>Estado actual:</strong>
        <span class="estado <?= str_replace(" ", "-", strtolower($solicitud["estado"])) ?>"><?= h($solicitud["estado"]) ?></span>
      </p>
    </div>

    <form id="formSeguimiento" action="guardar.php" method="post">
      <input type="hidden" name="id_solicitud" value="<?= $solicitud["id_solicitud"] ?>">

      <label for="estado">Nuevo estado</label>
      <select id="estado" name="estado">
        <option value="">Selecciona un estado</option>
        <option value="En proceso">En proceso</option>
        <option value="Resuelta">Resuelta</option>
      </select>

      <label for="observacion">Observación de la atención</label>
      <textarea id="observacion" name="observacion" rows="4"></textarea>

      <button type="submit" class="boton">Guardar cambios</button>
    </form>

    <h3>Historial de atención</h3>
    <?php if ($historial->num_rows === 0): ?>
      <p>Esta solicitud aún no tiene seguimiento.</p>
    <?php else: ?>
      <ul class="historial">
        <?php while ($fila = $historial->fetch_assoc()): ?>
          <li>
            <strong><?= h($fila["estado"]) ?></strong> · <?= h($fila["fecha_act"]) ?><br>
            <?= h($fila["observacion"]) ?>
          </li>
        <?php endwhile; ?>
      </ul>
    <?php endif; ?>
  </main>

  <script src="js/seguimiento.js"></script>
</body>
</html>