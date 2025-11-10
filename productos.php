<?php include("db.php"); ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Productos - Cooperativa CECYTEA</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
  <h1>Gestión de Productos</h1>

  <form method="POST">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <textarea name="descripcion" placeholder="Descripción"></textarea>
    <input type="number" step="0.01" name="precio" placeholder="Precio" required>
    <input type="number" name="stock" placeholder="Stock" required>
    <button type="submit" name="agregar">Agregar Producto</button>
  </form>

  <?php
  if (isset($_POST['agregar'])) {
      $n = $_POST['nombre'];
      $d = $_POST['descripcion'];
      $p = $_POST['precio'];
      $s = $_POST['stock'];
      $sql = "INSERT INTO productos (nombre, descripcion, precio, stock) VALUES ('$n','$d','$p','$s')";
      if ($conn->query($sql)) echo "<p class='ok'>Producto agregado correctamente.</p>";
      else echo "<p class='error'>Error: ".$conn->error."</p>";
  }
  ?>

  <h2>Lista de Productos</h2>
  <table>
    <tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Stock</th></tr>
    <?php
    $res = $conn->query("SELECT * FROM productos");
    while ($row = $res->fetch_assoc()) {
      echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['nombre']}</td>
        <td>{$row['descripcion']}</td>
        <td>\${$row['precio']}</td>
        <td>{$row['stock']}</td>
      </tr>";
    }
    ?>
  </table>

  <a href="index.php" class="volver">← Volver al inicio</a>
</body>
</html>
