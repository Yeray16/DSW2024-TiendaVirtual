<?php
namespace Daw2\Dsw2024TiendaVirtual;
class Product {
  public string $namefab;
  public string $name;
  public float $basePrice;
  public float $weight = 4250;
  public float $volume = 3300;

  public function __construct($namefab="Vodafone", $name="Yeray", $basePrice= 89.99)
  {
    $this->$namefab = $namefab;
    $this->$name = $name;
    $this->$basePrice = $basePrice;
  }

  public function calculateCost() {
    $sendCost = 2 + $this->weight*0.0002;
    if ($this->volume > 1000) {
      $sendCost += floor(($this->volume - 1) / 1000);
    }
    return round($sendCost, 2);
  }
  public function __toString()
  {
    return "Esto es el toString";
  }
}
