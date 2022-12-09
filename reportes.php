<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  <title>Reportes</title>
</head>

<body>
  <div class="container">
    <form action="controllers/print_all.php" method="POST">
      <button class="button is-primary is-large is-hovered" name="imprimirPorProducto" id="imprimirPorProducto">Reporte por producto</button>
    </form>
  </div>

  <div class="container">
    <form action="controllers/print_all.php" method="POST">
      <button class="button is-info is-large is-hovered" name="imprimirPorCliente" id="imprimirPorCliente">Reporte por Cliente</button>
    </form>
  </div>

</body>

</html>