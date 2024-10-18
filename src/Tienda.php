<?php
namespace Daw2\Dsw2024TiendaVirtual;

use Daw2\Dsw2024TiendaVirtual\Services;

class Tienda{
  private $elements = [];

  public function addElement($element) : void {
    $this->elements[] = $element;
  }

  public function showElements() : array {
    return $this->elements;
  }

  public function showProducts() : array {
    return array_filter($this->elements, fn($product) => $product instanceof Product);
  }

  public function showServices() : array {
    return array_filter($this->elements, fn($service) => $service instanceof Services);
  }

  public function showElementsWithExpiration() {
    return array_filter($this->elements, function($element) {
        if (isset($element->fechaCaducidad) && $element->fechaCaducidad !== '') {
            return true;
        }
        if (isset($element->date) && $element->date !== '') {
            return true;
        }

        return false;
    });
}

  public function showProductsNotExpired() : array {
    return array_filter($this->showElementsWithExpiration(), fn($element) => !$element->isExpired());
  }
}