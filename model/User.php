<?php

namespace Model;

class User{
    private $uga_id, $groupe, $nom, $prenom, $mail, $pass, $delegue, $permissions;

    public function __construct($uga_id = '', $pass = '', $nom = '', $prenom = '', $mail = '', $groupe = '', $delegue = false, $permissions = false) {
        $this->uga_id = $uga_id;
        $this->groupe = $groupe;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->pass = $pass;
        $this->delegue = $delegue;
        $this->permissions = $permissions;
    }

    public function getUgaId(): string {
        return $this->uga_id;
    }

    public function getPassword(): string {
        return $this->pass;
    }

    public function getGroupe() {
        return $this->groupe;
    }

    public function setGroupe($groupe){
        $this->groupe = $groupe;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getPrenom(): string {
        return $this->prenom;
    }

    public function getMail(): string {
        return $this->mail;
    }

    public function isDelegue() {
        return $this->delegue;
    }

    public function havePermissions(): bool{
        return ($this->permissions === null || $this->permissions === true);
    }


}