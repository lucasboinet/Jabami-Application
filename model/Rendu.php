<?php

namespace Model;

use DateTime;

class Rendu {
    private $num_rendu;
    private $module;
    private $description;
    private $date_limite;
    private $id_enseignant;
    private $color;
    private $groupe;
    private $temps_estime;
    private $id_eleve;

    public function __construct($color = '', $num_rendu = 0, $module = '', $description = '', $date_limite = '', $groupe = '', $id_enseignant = '', $temps_estime = '', $id_eleve = '') {
        $this->num_rendu = $num_rendu;
        $this->module = $module;
        $this->description = $description;
        $this->date_limite = $date_limite;
        $this->id_enseignant = $id_enseignant;
        $this->id_eleve = $id_eleve;
        $this->color = $color;
        $this->groupe = $groupe;
        $this->temps_estime = $temps_estime;
    }

    public function getId(): int {
        return $this->num_rendu;
    }

    public function getModule(): string {
        return $this->module;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getDate(): DateTime {
        return new DateTime($this->date_limite);
    }

    public function getIdUser() {
        $user = ($this->id_enseignant === null) ? $this->id_eleve : $this->id_enseignant;
        return $user;
    }

    public function addedByUser(): bool {
        return ($this->id_eleve !== null);
    }

    public function getColor(): string {
        return $this->color;
    }

    public function getGroupe(): string{
        return $this->groupe;
    }

    public function setGroupe(string $groupe){
        $this->groupe = $groupe;
    }

    public function getTempsEstime(): string {
        return $this->temps_estime;
    }
}