<?php
$query = "SELECT * FROM clientes";
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
  <title>Clientes</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body>
<a class="button is-link is-small" href="index.html" >Regresar al menu principal </a>
<div class="container">

  <form action="controllers/crudClientes.php" method="POST">
      <label><b>RAZON_SOCIAL</b></label>
      <input type="text" name="razon" required>

      <label><b>RFC</b></label>
      <input type="text" name="rfc" required>

      <button class="button is-primary is-small" name="guardarCliente">Guardar</button>
  </form>
  </div>
  

  <div class="container">
    <div>
      <?php
      echo "<table class='table' border='1'>
        <tr>
        <th>IDCLIENTE</th>
        <th>RAZON_SOCIAL</th>
        <th>RFC</th>
        <th>Actualizar</th>
        <th>Eliminar</th>
        </tr>";

      while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['IDCLIENTE'] . "</td>";
        echo "<td>" . $row['RAZON_SOCIAL'] . "</td>";
        echo "<td>" . $row['RFC'] . "</td>";
        echo "<td><a href='controllers/editClient.php?idcliente=" . $row['IDCLIENTE'] . "'><img src='./images/edit.png' alt='Edit'></td>";
        echo "<td><a href='controllers/crudClientes.php?delete=" . $row['IDCLIENTE'] . "'><img src='./images/trash.png' alt='Del'></a></td>";
        echo "</tr>";
      }
      echo "</table>";

      ?>
    </div>
  </div>

</body>

</html>