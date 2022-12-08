<?php
include("../config/config.php");
$idcliente = $_GET['idcliente'];
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body>
  <h1 class="title">Actualizar cliente</h1>
  <div class="container">

    <form action="crudClientes.php" method="POST">
      <?php
      $result = mysqli_query($mysqli, "SELECT * FROM clientes WHERE IDCLIENTE ='$idcliente'");
      while ($row = mysqli_fetch_array($result)) {
        echo "<input type='hidden' name='idcliente' value='{$row['IDCLIENTE']}' required>";
        echo "<label><b>RAZON_SOCIAL</b></label><input type='text' name='razon' value='{$row['RAZON_SOCIAL']}' required> <br>";
        echo "<label><b>RFC</b></label><input type='text'name='rfc' value='{$row['RFC']}' required> <br>";
        echo "<button class='button is-warning is-small' name='actualizarCliente'>Actualizar</button>";
        echo "</div>";
      }
      ?>
    </form>
  </div>

</body>

</html>