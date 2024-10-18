<?php
namespace Daw2\Dsw2024TiendaVirtual;

use DateTime;

class Events extends Services{
public $date;

public function __construct($name, $basePrice, $date) {
  parent::__construct($name, $basePrice);
  $this->date = $date;
}

public function isExpired() {
  $today = new DateTime();
  $today->setTime(0,0,0);
  return $today > new DateTime($this->date);
}

public function daysTillTheEvent() {
  $today = new DateTime();
  $today->setTime(0,0,0);
  $dateLimit = new DateTime($this->date);
  return date_diff($today, $dateLimit)->days;
}

public function getNewPrice() {
  if ($this->daysTillTheEvent() == 0) {
    return $this->getPrice() * 1.5;
  }
  else if ($this->daysTillTheEvent() <= 7) {
    return $this->getPrice() * 1.2;
  }
  else return $this->getPrice();
}
}
?>