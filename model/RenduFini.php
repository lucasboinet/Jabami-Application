<?php

namespace Model;

use DateTime;

class RenduFini {
    private $id_rendu, $id_eleve, $date_rendu, $temps;

    function __construct($id_eleve = '', $id_rendu = 0, $date_rendu = '', $temps = '') {
        $this->id_rendu = $id_rendu;
        $this->id_eleve = $id_eleve;
        $this->date_rendu = $date_rendu;
        $this->temps = $temps;
    }

    function getIdRendu(): int {
        return $this->id_rendu;
    }

    function getIdEleve(): string {
        return $this->id_eleve;
    }

    function getDate(): DateTime {
        return new DateTime($this->date_rendu);
    }

    function getTemps(): string {
        return explode('h', $this->temps)[0];
    }
}
