<?php
$query = "SELECT * FROM productos";
$productos = filterRecord($query);

$query2 = "SELECT * FROM clientes";
$clientes = filterRecord($query2);

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
  <script src="js/ventas.js"></script>
</head>

<body>
  <a class="button is-link is-small" href="index.html">Regresar al menu principal </a>

  <div class="container">

  Datos Del Cliente
    <textarea name="datosCliente" id="datosCliente" cols="30" rows="10"></textarea>
    
    <label><b>Seleccione el cliente</b></label>
    <select name='cliente' id='cliente' class='select' onchange="infoCliente(this)">
      <option></option>
      <?php
      $i = 1;
      $text = "";
      while ($array = $clientes->fetch_assoc()) {
        $text .= "<option value=" . $array['IDCLIENTE'] . ">" . $array['RFC'] . "</option>";
        $i++;
      }
      echo $text;
      ?>
    </select>
    
   

    <label><b>Seleccione el producto</b></label>
    <select name='producto' id='producto' class='select'>
      <option></option>
      <?php
      $i = 1;
      $text = "";
      while ($array = $productos->fetch_assoc()) {
        $text .= "<option value=" . $array['IDMATERIAL'] . ">" . $array['DESCRIPCION'] . "</option>";
        $i++;
      }
      echo $text;
      ?>
    </select>

    <label><b>Cantidad de piezas</b></label>
    <input type="number" name="cantidad" id="cantidad" required>

    <button class="button is-primary is-small" name="buttonTabla" id="buttonTabla">Agregar</button>
  </div>

  <br>

  <form action="controllers/crudVentas.php" method="POST">
    <div class="container" id="divTabla">
      <table class="table" id="tablaProductos" border="1px">
        <th>Producto</th>
        <th>Cantidad</th>
      </table>
      <button class="button is-info is-small" name="guardarVenta">Guardar</button>
    </div>
  </form>


</body>

</html>