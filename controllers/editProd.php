<?php
include("../config/config.php");
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body>
<h1 class="title">Actualizar producto</h1>
  <div class="container">

    <form action="crudProductos.php" method="POST">
      <?php
      $result = mysqli_query($mysqli, "SELECT * FROM productos WHERE id ='$id'");
      while ($row = mysqli_fetch_array($result)) {
        echo"<input type='hidden' name='id' value='{$row['id']}' required>";
        echo "<label><b>Nombre material</b></label><input type='text' name='material' value='{$row['IDMATERIAL']}' required> <br>";
        echo "<label><b>Descripcion</b></label><input type='text'name='descripcion' value='{$row['DESCRIPCION']}' required> <br>";
        echo "<label><b>Unidad Medida</b></label><input type='text' name='medida' value='{$row['UNIDADMEDIDA']}' required> <br>";
        echo "<label><b>Precio</b></label><input type='text' name='precio' value='{$row['PRECIO1']}' required><br>";
        echo "<button class='button is-warning is-small' name='actualizarProducto'>Actualizar</button>";
        echo "</div>";
      }
      ?>
    </form>
  </div>

</body>

</html>