<?php
namespace Model;

use DateTime;

class Notification {
  private $id, $type, $message, $date_envoi, $est_vu, $id_eleve;

  function __construct($id = 0,$type = '', $message = '', $date_envoi = '', $est_vu = false, $id_eleve = '') {
     $this->id = $id;
     $this->type = $type;
     $this->message = $message;
     $this->date_envoi = $date_envoi;
     $this->est_vu = $est_vu;
     $this->id_eleve = $id_eleve;
  }
  function getId(): int {
      return $this->id;
  }
  function getType(): string {
      return $this->type;
  }
  function getMessage(): string {
      return $this->message;
  }
  function getDateEnvoi(): DateTime {
      return new DateTime($this->date_envoi);
  }
  function estVu(): bool {
      return $this->est_vu;
  }
  function getIdEleve(): string {
      return $this->id_eleve;
  }
}
