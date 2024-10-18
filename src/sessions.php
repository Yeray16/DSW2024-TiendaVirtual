<?php
namespace Daw2\Dsw2024TiendaVirtual;

class Sessions extends Services {
  public $sessions;

  public function __construct($name, $basePrice, $sessions) {
    parent::__construct($name, $basePrice);
    $this->sessions = $sessions;
  }

  public function addSessions($num) {
    return $this->sessions + $num;
  }

  public function removeSessions() {
    return --$this->sessions;
  }
}