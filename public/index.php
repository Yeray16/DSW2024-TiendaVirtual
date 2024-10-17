<?php
require '../vendor/autoload.php';
use Daw2\Dsw2024TiendaVirtual\Product;

$prueba = new Product();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Página de prueba de Product</h1>
  <p>
    <?= $prueba->calculateCost() ?>
  </p>
</body>
</html>