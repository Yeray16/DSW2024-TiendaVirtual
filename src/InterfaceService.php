<?php
namespace Daw2\Dsw2024TiendaVirtual;

interface InterfaceService {
  public function isExpired();
  public function daysTillTheEvent();
  public function getNewPrice();
  public function addSessions($num);
  public function removeSessions();
}