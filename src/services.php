<?php
namespace Daw2\Dsw2024TiendaVirtual;
class Services {
  public string $name;
  public float $basePrice;
  private float $vat = 0.07;
  
  public function __construct(string $name, float $basePrice) {
    $this->name = $name;
    $this->basePrice = $basePrice;
  }

  public function setVat($vat) : void {
    $this->vat = $vat;
  }

  public function getPrice() : float {
    return $this->basePrice + ($this->basePrice * $this->vat);
  }
}
?>