<?php
  require_once __DIR__.'/../vendor/autoload.php';
  use Model\database\DAO;
  $db = new DAO();
  $db->deleteNotifications();
  $rendus = $db->customRequest("SELECT module, date_limite, uga_id FROM rendu, eleve where date_limite <= now()+interval'2days' AND date_limite > now()+interval'1days' AND (groupe, num_rendu) in (select libelle, num_rendu FROM rendu_groupe)");
  foreach ($rendus as $eleve) {
    $db->addNotification('rendu_date', "Le rendu en $eleve->module arrive bientôt à son terme ($eleve->date_limite)", $eleve->uga_id);
  }
  $renduDepasse = $db->customRequest("SELECT module, date_limite, uga_id FROM rendu, eleve where date_limite <= now()-interval'1days' AND date_limite > now()-interval'2days' AND (groupe, num_rendu) in (select libelle, num_rendu FROM rendu_groupe)");
  foreach ($renduDepasse as $eleve) {
    $db->addNotification('rendu_date_dep', "Le rendu en $eleve->module est arrivé à son terme ($eleve->date_limite)", $eleve->uga_id);
  }
  $db->deleteRendus();
 ?>
