<?php
require '../vendor/autoload.php';

use Daw2\Dsw2024TiendaVirtual\Events;
use Daw2\Dsw2024TiendaVirtual\MixedService;
use Daw2\Dsw2024TiendaVirtual\NormalServices;
use Daw2\Dsw2024TiendaVirtual\Product;
use Daw2\Dsw2024TiendaVirtual\Sessions;
use Daw2\Dsw2024TiendaVirtual\Tienda;


$tienda = new Tienda();

$tienda->addElement(new Product('Braun', 'Cyclone 23', 89.99, 4250, 3300, ''));
$tienda->addElement(new Product('Joselito', 'Reserva Iberico', 215, 6790, 4000, '2024/03/15'));
$tienda->addElement(new Product('Apple', 'iPhone', 999.99, 150, 250, ''));
$tienda->addElement(new Product('Plátano Canarias', 'Banana', 3, 10, 300, '2024/10/20'));
$tienda->addElement(new Product('Danone', 'Yogurt', 1.5, 100, 200, '2024/11/05'));

$tienda->addElement(new Events('Tomorrowland', 100, '2024-10-18'));
$tienda->addElement(new Events('Rock in Rio', 120, '2024-12-10'));
$tienda->addElement(new Events('Concierto Anuel', 150, '2023-10-15'));

$tienda->addElement(new Sessions('Clases de Piano', 200, 10));
$tienda->addElement(new Sessions('Clases de Guitarra', 180, 0));

$tienda->addElement(new MixedService('Yoga Noviembre', 100, '2024-11-30', 12));
$tienda->addElement(new MixedService('Yoga Octubre', 120, '2023-10-01', 0));

$tienda->addElement(new NormalServices('Netflix', 15));
$tienda->addElement(new NormalServices('Spotify', 9.99));

$filtro = $_GET['filtro'] ?? 'todos';

$items = [];

switch ($filtro) {
    case 'productos':
        $items = $tienda->showProducts();
        break;
    case 'servicios':
        $items = $tienda->showServices();
        break;
    case 'expiracion':
        $items = $tienda->showElementsWithExpiration();
        break;
    case 'vendibles':
        $items = $tienda->showProductsNotExpired();
        break;
    default:
        $items = $tienda->showElements();
}
?>
<!DOCTYPE html> 
<html lang="es"> 
    <head> 
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Tienda Virtual</title> 
    </head> 
    <body> 
        <h1>Bienvenido a la tienda, selecciona lo que desea realizar:</h1> 
        <nav> 
            <a href="?filtro=todos">Mostrar todo</a> 
            <a href="?filtro=productos">Mostrar los productos</a> 
            <a href="?filtro=servicios">Mostrar los servicios</a>
            <a href="?filtro=expiracion">Mostrar los elementos con fecha de caducidad</a> 
            <a href="?filtro=vendibles">Mostrar los productos no caducados</a> 
        </nav> 
        <ul>
          <?php foreach ($items as $item) { ?>
          <li>
            Nombre del producto o servicio: <?= $item->name ?> - 
            Precio: <?= $item->getPrice() ?>
          </li>
          <?php } ?>
        </ul>
    </body> 
</html>  