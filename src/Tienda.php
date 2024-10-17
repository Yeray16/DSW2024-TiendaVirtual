<?php
namespace Daw2\Dsw2024TiendaVirtual;

class Tienda{
  private array $products = [];
  private array $services = [];

  public function addProduct(Product $p) : void{
    array_push($this->products, $p);
  }
  public function addService(Service $s) : void{
    array_push($this->services, $s);
  }

  public function showProducts() : array {
    return $this->products;
  }
}