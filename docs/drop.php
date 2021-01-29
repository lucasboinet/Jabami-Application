<?php
try {
    $db = new PDO('pgsql:host=postgresql-jabami.alwaysdata.net;dbname=jabami_app', 'jabami', 'jabami_dev6');
    echo "connected to pgsql\n";
    $db->query("drop table if exists enseigne");
    $db->query("drop table if exists rendu_fini");
    $db->query("drop table if exists rendu_groupe");
    $db->query("drop table if exists notification");
    $db->query("drop table if exists eleve");
    $db->query("drop table if exists rendu");
    $db->query("drop table if exists enseignant");
    $db->query("drop table if exists groupes");
    $db->query("drop table if exists module");
}catch(PDOException $e){
    die("DAO.php: Erreur de connexion -> ".$e->getMessage());
}
?>
