<?php
$query = "SELECT * FROM productos";
$result = filterRecord($query);

function filterRecord($query)
{
  include("config/config.php");
  $filter_result = mysqli_query($mysqli, $query);
  return $filter_result;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body>
<a class="button is-link is-small" href="index.html" >Regresar al menu principal </a>
  <form action="controllers/crudProductos.php" method="POST">
    <div class="container">
      <label><b>Nombre material</b></label>
      <input type="text" name="material" required>

      <label><b>Descripcion</b></label>
      <input type="text" name="descripcion" required>

      <label><b>Unidad Medida</b></label>
      <input type="text" name="medida" required>

      <label><b>Precio</b></label>
      <input type="number" name="precio" required>

      <button class="button is-primary is-small" name="guardarProducto">Guardar</button>
    </div>
  </form>
  

  <div class="container">
    <div>
      <?php
      echo "<table class='table' border='1'>
        <tr>
        <th>IDMATERIAL</th>
        <th>DESCRIPCION</th>
        <th>UNIDADMEDIDA</th>
        <th>PRECIO1</th>
        <th>Actualizar</th>
        <th>Eliminar</th>
        </tr>";

      while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['IDMATERIAL'] . "</td>";
        echo "<td>" . $row['DESCRIPCION'] . "</td>";
        echo "<td>" . $row['UNIDADMEDIDA'] . "</td>";
        echo "<td>" . $row['PRECIO1'] . "</td>";
        echo "<td><a href='controllers/editProd.php?id=" . $row['id'] . "'><img src='./images/edit.png' alt='Edit'></td>";
        echo "<td><a href='controllers/crudProductos.php?delete=" . $row['id'] . "' name='borrarProducto'><img src='./images/trash.png' alt='Del'></a></td>";
        echo "</tr>";
      }
      echo "</table>";

      ?>
    </div>
  </div>

</body>

</html>