<?php
namespace Daw2\Dsw2024TiendaVirtual;
class Product {
  public string $namefab;
  public string $name;
  public float $basePrice;
  public float $weight;
  public float $volume;

  public function __construct($namefab, $name, $basePrice, $weight, $volume)
  {
    $this->namefab = $namefab;
    $this->name = $name;
    $this->basePrice = $basePrice;
    $this->weight = $weight;
    $this->volume = $volume;
  }

  public function calculateCost() {
    $sendCost = 2 + $this->weight*0.0002;
    if ($this->volume > 1000) {
      $sendCost += floor(($this->volume - 1) / 1000);
    }
    return round($sendCost, 2);
  }
}
