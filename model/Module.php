<?php

namespace Model;

use DateTime;

class Module {
    private $color, $code, $ens, $groupe, $salle, $debut, $fin;

    function __construct($color, $code, $ens, $groupe, $salle, $debut, $fin){
        $this->color = $color;
        $this->code = $code;    //intitulé du cours
        $this->ens = $ens;      //array des enseignants du cours
        $this->groupe = $groupe;//array des goupes assistants au cours
        $this->salle = $salle;  //array des salles du cours
        $this->debut = $debut;  //temps de debut
        $this->fin = $fin;      //temps de fin
    }

    function getCode(): string {
        return $this->code;
    }

    function getEnseignant(): array {
        return (sizeof($this->ens) > 0) ? $this->ens : array();
    }

    function getGroupe(): array {
        return (sizeof($this->groupe) > 0) ? $this->groupe :  array();
    }

    function getSalle(): array {
        return $this->salle;
    }

    function getDuration(): float {
        $interval = $this->getFin()->diff($this->getDebut());
        $days_passed = $interval->format('%a');
        $hours_diff = $interval->format('%H');
        $minutes_diff = $interval->format('%I');
        return (($days_passed*24 + $hours_diff) * 60 + $minutes_diff) / 60;
    }

    function getDebut(): DateTime {
        return $this->debut;
    }

    function getFin(): DateTime {
        return $this->fin;
    }

    public function getColor(): string {
        return $this->color;
    }

}