<?php
include "conexion.php";

$sql = "SELECT s.id_solicitud, u.nombre AS usuario, e.nombre AS equipo,
               s.descripcion, s.estado
        FROM solicitudes s
        JOIN usuarios u ON u.id_usuario = s.id_usuario
        JOIN equipos e ON e.id_equipo = s.id_equipo
        ORDER BY s.id_solicitud DESC";
$resultado = $conexion->query($sql);

$msg  = $_GET["msg"] ?? "";
$tipo = ($_GET["tipo"] ?? "") === "error" ? "error" : "exito";
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Seguimiento de solicitudes</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
  <header>
    <h1>Soporte Técnico</h1>
    <p>Seguimiento de solicitudes</p>
  </header>

  <nav>
    <!-- Cambia los # por las rutas de las carpetas de tus compañeros -->
    <a href="#">Inicio</a>
    <a href="#">Usuarios y equipos</a>
    <a href="#">Solicitudes</a>
    <a href="index.php" class="activo">Seguimiento</a>
  </nav>

  <main>
    <div id="aviso" data-msg="<?= h($msg) ?>" data-tipo="<?= $tipo ?>"></div>

    <h2>Seguimiento de solicitudes</h2>
    <p>Selecciona una solicitud para actualizar su estado.</p>

    <div class="tabla-wrap">
      <table>
        <thead>
          <tr><th>Folio</th><th>Usuario</th><th>Equipo</th><th>Problema</th><th>Estado</th><th></th></tr>
        </thead>
        <tbody>
          <?php if ($resultado->num_rows === 0): ?>
            <tr><td colspan="6">Aún no hay solicitudes registradas.</td></tr>
          <?php endif; ?>

          <?php while ($s = $resultado->fetch_assoc()): ?>
            <tr>
              <td>#<?= $s["id_solicitud"] ?></td>
              <td><?= h($s["usuario"]) ?></td>
              <td><?= h($s["equipo"]) ?></td>
              <td><?= h($s["descripcion"]) ?></td>
              <td><span class="estado <?= str_replace(" ", "-", strtolower($s["estado"])) ?>"><?= h($s["estado"]) ?></span></td>
              <td><a class="boton" href="actualizar.php?id=<?= $s["id_solicitud"] ?>">Ver / Actualizar</a></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </main>

  <script src="js/seguimiento.js"></script>
</body>
</html>