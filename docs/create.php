<?php
try {
    $db = new PDO('pgsql:host=postgresql-jabami.alwaysdata.net;dbname=jabami_app', 'jabami', 'jabami_dev6');
    echo "connected to pgsql\n";
    $db->query("create table groupes (
      libelle varchar(9) PRIMARY KEY)");
    $db->query("create table module (
      code varchar(10) PRIMARY KEY,
      matiere varchar(60) not null,
      couleur varchar(10) not null)");
    $db->query("create table enseignant (
      uga_id varchar(8) check (length(uga_id) >= 4) PRIMARY KEY,
      pass varchar(100) not null,
      nom varchar(50) not null,
      prenom varchar(50) not null,
      mail varchar(100) not null)");
    $db->query("create table eleve (
    	uga_id varchar(8) check (length(uga_id) >= 4)  PRIMARY KEY,
    	pass varchar(100) not null,
      nom varchar(20) not null,
      prenom varchar(20) not null,
      mail varchar(100) not null,
      delegue boolean not null default FALSE,
      permissions boolean not null default FALSE,
      groupe varchar(9) not null,
      FOREIGN KEY (groupe) REFERENCES groupes(libelle))");
    $db->query("create table rendu (
      num_rendu SERIAL primary key,
      module varchar(10) not null,
      description text not null,
      date_limite date not null,
      id_enseignant varchar(8),
      id_eleve varchar(8),
      temps_estime varchar(10) check (temps_estime like '%h')  not null,
      FOREIGN KEY (id_enseignant) REFERENCES enseignant(uga_id),
      FOREIGN KEY (id_eleve) REFERENCES eleve(uga_id),
      FOREIGN KEY (module) REFERENCES module(code))");
    $db->query("create table rendu_groupe(
        id SERIAL primary key,
        libelle varchar(9) not null,
        num_rendu SERIAL not null,
        unique (num_rendu, libelle),
        FOREIGN KEY (libelle) REFERENCES groupes(libelle),
        FOREIGN KEY (num_rendu) REFERENCES rendu(num_rendu))");
    $db->query("create table rendu_fini(
      id_eleve varchar(8) not null,
      id_rendu SERIAL not null,
      date_rendu date default current_date not null,
      temps varchar(10) check (temps like '%h') not null,
      FOREIGN KEY (id_eleve) REFERENCES eleve(uga_id),
      FOREIGN KEY (id_rendu) REFERENCES rendu_groupe(id),
      PRIMARY KEY (id_eleve, id_rendu))");

    $db->query("create table enseigne (
      id_enseignant varchar(8) not null,
      groupe varchar(9) not null,
      module varchar(10) not null,
      FOREIGN KEY (id_enseignant) REFERENCES enseignant(uga_id),
      FOREIGN KEY (groupe) REFERENCES groupes(libelle),
      FOREIGN KEY (module) REFERENCES module(code),
      PRIMARY KEY (id_enseignant, groupe, module))");

    $db->query("create table notification(
      id SERIAL primary key,
      type varchar(20) constraint c_type check (type in ('perm','rendu', 'rendu_date', 'rendu_date_dep', 'rendu_modif')) not null,
      message text not null,
      date_envoi timestamp with time zone default current_timestamp not null,
      est_vu boolean not null default FALSE,
      id_eleve varchar(8) not null,
      FOREIGN KEY (id_eleve) REFERENCES eleve(uga_id))");
}catch(PDOException $e){
    die("DAO.php: Erreur de connexion -> ".$e->getMessage());
}
?>
