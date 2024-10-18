<?php
namespace Daw2\Dsw2024TiendaVirtual;

use DateTime;

class Product {
  private float $imp = 7;
  public string $namefab;
  public string $name;
  public float $basePrice;
  public float $weight;
  public float $volume;
  public $fechaCaducidad;

  public function __construct($namefab, $name, $basePrice, $weight, $volume, $fechaCaducidad)
  {
    $this->namefab = $namefab;
    $this->name = $name;
    $this->basePrice = $basePrice;
    $this->weight = $weight;
    $this->volume = $volume;
    $this->fechaCaducidad = $fechaCaducidad;
  }

  public function setImp($imp) {
    return $this->imp = $imp;
  }

  public function getPrice () {
    return $this->basePrice + ($this->basePrice * ($this->imp / 100));
  }

  public function calculateCost() {
    $sendCost = 2 + $this->weight*0.0002;
    if ($this->volume > 1000) {
      $sendCost += floor(($this->volume - 1) / 1000);
    }
    return round($sendCost, 2);
  }

  public function isExpired() {
    $now = new DateTime();
    $now->setTime(0,0,0);
    return $now > new DateTime($this->fechaCaducidad);
  }

  public function daysLeft () {
    $now = new DateTime();
    $now->setTime(0,0,0);
    $expirationDate = new DateTime($this->fechaCaducidad);
    return date_diff($now, $expirationDate)->days;
  }
}
