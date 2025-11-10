<?php include("db.php"); ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Cooperativa CECYTEA - Socios</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
  <h1>Gestión de Socios</h1>

  <form method="POST">
    <input type="text" name="nombre" placeholder="Nombre del socio" required>
    <input type="text" name="curp" placeholder="CURP">
    <input type="text" name="telefono" placeholder="Teléfono">
    <input type="text" name="direccion" placeholder="Dirección">
    <button type="submit" name="agregar">Agregar Socio</button>
  </form>

  <?php
  if (isset($_POST['agregar'])) {
      $nombre = $_POST['nombre'];
      $curp = $_POST['curp'];
      $tel = $_POST['telefono'];
      $dir = $_POST['direccion'];
      $sql = "INSERT INTO socios (nombre, curp, telefono, direccion) VALUES ('$nombre','$curp','$tel','$dir')";
      if ($conn->query($sql)) echo "<p class='ok'>Socio agregado correctamente.</p>";
      else echo "<p class='error'>Error: ".$conn->error."</p>";
  }
  ?>

  <h2>Lista de Socios</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>CURP</th>
      <th>Teléfono</th>
      <th>Dirección</th>
      <th>Fecha Alta</th>
    </tr>
    <?php
    $res = $conn->query("SELECT * FROM socios");
    while ($row = $res->fetch_assoc()) {
      echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['nombre']}</td>
        <td>{$row['curp']}</td>
        <td>{$row['telefono']}</td>
        <td>{$row['direccion']}</td>
        <td>{$row['fecha_alta']}</td>
      </tr>";
    }
    ?>
  </table>

  <a href="index.php" class="volver">← Volver al inicio</a>
</body>
</html>
