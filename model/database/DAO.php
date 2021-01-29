<?php
namespace Model\database;

use Model\User;
use Model\Rendu;
use Model\RenduFini;
use Model\Notification;
use PDO;
use PDOException;
use DateTime;

class DAO {
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO('pgsql:host=postgresql-jabami.alwaysdata.net;dbname=jabami_app', 'jabami', 'jabami_dev6');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }catch(PDOException $e){
            die("DAO.php: Erreur de connexion -> ".$e->getMessage());
        }
    }

    /////////////////////////////////////////////
    //////             GETTERS             //////
    /////////////////////////////////////////////

    public function getUser(string $uga_id) {
        $req = "SELECT * FROM v_users WHERE uga_id = '$uga_id'";
        $query = $this->db->query($req);
        $res = $query->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Model\User');
        if(!empty($res)){
            if($res[0]->getGroupe() === null){
                $res[0]->setGroupe($this->getGroupOfEnseignant($res[0]->getUgaId()));
            }
            return $res[0];
        }
        return null;
    }

    public function getPermissions(string $uga_id){
        $req = "SELECT * FROM v_users WHERE uga_id = '$uga_id'";
        $query = $this->db->query($req);
        $res = $query->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Model\User')[0];
        return $res->havePermissions();
    }

    public function getDelegue(string $uga_id){
        $req = "SELECT * FROM v_users WHERE uga_id = '$uga_id'";
        $query = $this->db->query($req);
        $res = $query->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Model\User')[0];
        return $res->isDelegue();
    }

    public function getUsersByGroupe(string $groupe) {
        $req = "SELECT * FROM v_users WHERE groupe LIKE '$groupe%' ORDER BY uga_id";
        $query = $this->db->query($req);
        return $query->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Model\User');
    }

    public function getGroupOfEnseignant(string $uga_id) {
        $req = "SELECT groupe FROM enseigne WHERE id_enseignant = '$uga_id' ORDER BY groupe ASC";
        $r = $this->db->query($req);
        $res = $r->fetchAll(PDO::FETCH_CLASS);
        $finalS = [];
        foreach($res as $re){
            $finalS[] = $re->groupe;
        }
        return implode(", ", $finalS);
    }

    public function getModuleOfEns(string $uga_id, string $groupe) {
        if(strlen($groupe) === 7 || strlen($groupe) === 6){
            $userSemester = $groupe[4];
        }else {
            $userSemester = $groupe[5];
        }
        $moduleType = 'M'.$userSemester;
        $req = "SELECT distinct module FROM enseigne WHERE id_enseignant = '$uga_id' AND groupe LIKE '$groupe%' AND module LIKE '$moduleType%'";
        $r = $this->db->query($req);
        $res = $r->fetchAll(PDO::FETCH_OBJ);
        $finalS = [];
        foreach($res as $re){
            $finalS[] = $re->module;
        }
        return $finalS;
    }

    public function getRenduOfEns(string $uga_id){
        $req = "SELECT * FROM rendu WHERE id_enseignant = '$uga_id'";
        $query = $this->db->query($req);
        $renduListe = $query->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Model\Rendu');

        foreach($renduListe as $rendu){
            $renduId = $rendu->getId();
            $req = "SELECT libelle FROM rendu_groupe WHERE num_rendu = '$renduId'";
            $query = $this->db->query($req);
            $res = $query->fetchAll(PDO::FETCH_OBJ);
            $renduGroup = [];
            foreach($res as $groupe){
                $renduGroup[] = $groupe->libelle;
            }
            $rendu->setGroupe(implode(", ", $renduGroup));
        }
        return $renduListe;
    }

    public function getRendu(int $id, string $groupe) {
        $moduleList = $this->getAllModuleColor();
        $req = "SELECT * FROM rendu WHERE num_rendu = '$id' AND num_rendu IN (SELECT num_rendu FROM rendu_groupe WHERE libelle LIKE '$groupe%')";
        $query = $this->db->query($req);
        $res = $query->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Model\Rendu');
        $r = "SELECT num_rendu,libelle FROM rendu_groupe WHERE libelle LIKE '$groupe%' AND num_rendu = $id";
        $q = $this->db->query($r);
        $fa = $q->fetchAll(PDO::FETCH_OBJ);
        $renduGroup = [];

        foreach($fa as $gr){
            $renduGroup[] = $gr->libelle;
        }

        if(!empty($res)){
            $res[0]->setGroupe(implode(", ", $renduGroup));
            return $res[0];
        }else {
            return null;
        }
    }

    public function getRendusByGroupe(string $groupe) {
        $moduleList = $this->getAllModuleColor();
        $req = "SELECT * FROM rendu WHERE num_rendu IN (SELECT num_rendu FROM rendu_groupe WHERE libelle LIKE '$groupe%')";
        $query = $this->db->query($req);
        $rendus = [];
        $r = "SELECT num_rendu,libelle FROM rendu_groupe WHERE libelle LIKE '$groupe%'";
        $q = $this->db->query($r);
        $fa = $q->fetchAll(PDO::FETCH_OBJ);
        foreach($query->fetchAll(PDO::FETCH_OBJ) as $rendu) {
            $gp = "";
            foreach($fa as $re){
                if($re->num_rendu == $rendu->num_rendu){
                    if($gp != ""){
                        $gp = substr($gp, 0, strlen($gp)-1);
                    }else{
                        $gp = $re->libelle;
                    }
                }
            }

            $rendus[] = new Rendu($this->getElementColor($rendu->module, $moduleList),$rendu->num_rendu, $rendu->module, $rendu->description, $rendu->date_limite, $gp, $rendu->id_enseignant, $rendu->temps_estime, $rendu->id_eleve);
        }
        return $rendus;
    }

    public function getRenduFiniByGroupe(int $id, string $groupe) {
        $req = "SELECT * FROM rendu_fini WHERE id_rendu IN (SELECT id FROM rendu_groupe WHERE num_rendu = '$id' AND libelle LIKE '$groupe%')";
        $query = $this->db->query($req);
        return $query->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Model\RenduFini');
    }

    public function getAllRendusFini(string $uga_id) {
        $req = "SELECT * FROM rendu_fini WHERE id_eleve = '$uga_id'";
        $query = $this->db->query($req);
        return $query->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Model\RenduFini');
    }

    public function getRenduFiniById(string $uga_id, int $id){
        $req = "SELECT * FROM rendu_fini WHERE id_eleve = '$uga_id' AND id_rendu IN (SELECT id FROM rendu_groupe WHERE num_rendu = '$id')";
        $query = $this->db->query($req);
        $res = $query->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Model\RenduFini');
        if(!empty($res)){
            return $res[0];
        }else {
            return null;
        }
    }

    public function getNotifications(string $uga_id){
      $req = "SELECT * FROM notification WHERE id_eleve = '$uga_id' AND est_vu = false ORDER BY date_envoi DESC";
      $query = $this->db->query($req);
      return $query->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Model\Notification');
    }

    public function getAllNotifications(string $uga_id){
        $req = "SELECT * FROM notification WHERE id_eleve = '$uga_id' ORDER BY date_envoi DESC";
        $query = $this->db->query($req);
        return $query->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Model\Notification');
      }
    /////////////////////////////////////////////
    //////             SETTERS             //////
    /////////////////////////////////////////////

    public function addRenduFini(string $id_eleve, int $id_rendu, string $temps){
        $currentEleveGroupe = $_SESSION['SESSID']['groupe'];
        $query = $this->db->query("SELECT rg.id FROM rendu r, rendu_groupe rg WHERE rg.num_rendu = r.num_rendu AND r.num_rendu = $id_rendu AND rg.libelle = '$currentEleveGroupe'");
        $res = $query->fetchAll(PDO::FETCH_CLASS);
        $req = $this->db->prepare("INSERT INTO rendu_fini (id_eleve,id_rendu,date_rendu,temps) VALUES (?,?,current_date,?)");
        $req->execute([$id_eleve, $res[0]->id, $temps]);
    }

    public function removeRenduFini(string $id_eleve, int $id_rendu){
        $currentEleveGroupe = $_SESSION['SESSID']['groupe'];
        $query = $this->db->query("SELECT rg.id FROM rendu r, rendu_groupe rg WHERE rg.num_rendu = r.num_rendu AND r.num_rendu = $id_rendu AND rg.libelle = '$currentEleveGroupe'");
        $res = $query->fetchAll(PDO::FETCH_CLASS);
        $req = $this->db->prepare("DELETE FROM rendu_fini WHERE id_eleve = ? AND id_rendu = ?");
        $req->execute([$id_eleve, $res[0]->id]);
    }

    public function createRendu(string $module, array $groupe, string $date, string $temps, string $desc){
        $user_id = $_SESSION['SESSID']['id'];
        $userType = ($_SESSION['SESSID']['is_delegue'] === null) ? 'id_enseignant' : 'id_eleve' ;
        //Ajoute les informations du rendu à la base de données
        $addRendu = $this->db->prepare("INSERT INTO rendu (module, description, date_limite, $userType, temps_estime) values (?, ?, ?, ?, ?)");
        $addRendu->execute([$module, $desc, $date, $user_id, $temps]);
        //Assign le rendu précédemment ajouté a chaque groupe indiqué
        $query = $this->db->query("SELECT currval('rendu_num_rendu_seq')");
        $res = $query->fetchAll(PDO::FETCH_CLASS);
        foreach($groupe as $g){
            $addRendu = $this->db->prepare("INSERT INTO rendu_groupe (libelle, num_rendu) values (?, ?)");
            $addRendu->execute([$g, $res[0]->currval]);
        }
    }

    public function changerPermissions(string $uga_id){
        $perm = !$this->getPermissions($uga_id);

        $updatePerm = $this->db->prepare("UPDATE eleve SET permissions = :perm WHERE uga_id = :id");
        $updatePerm->execute([':perm' => $perm ? 'true' : 'false',':id' => $uga_id]);
    }

    public function changerDelegue(string $uga_id){
        $delegue = !$this->getDelegue($uga_id);
        $updateDelegue = $this->db->prepare("UPDATE eleve SET delegue = :delegue WHERE uga_id = :id");
        $updateDelegue->execute([':delegue' => $delegue ? 'true' : 'false', ':id' => $uga_id]);
    }

    public function changerPass(string $uga_id, string $nouveau_pass){
      $updatePass = $this->db->prepare("UPDATE eleve SET pass=:password WHERE uga_id=:id");
      $updatePass->execute([':password' => $nouveau_pass, ':id' => $uga_id]);
    }

    public function notificationsLues(string $uga_id){
      $updateNotif = $this->db->prepare("UPDATE notification SET est_vu=true WHERE est_vu = false AND id_eleve = :id");
      $updateNotif->execute([':id' => $uga_id]);
    }

    public function addNotification(string $type,string $message,string $uga_id){
        $addRendu = $this->db->prepare("INSERT INTO notification (type,message,date_envoi,id_eleve) VALUES (?, ?, current_timestamp, ?)");
        $addRendu->execute([$type,$message,$uga_id]);
    }

    public function deleteNotifications(){
      $deleteNotif = $this->db->prepare("DELETE FROM notification WHERE est_vu = true AND date_envoi <= now()-interval'30days'");
      $deleteNotif->execute();
    }

    public function deleteRendus(){
      $deleteRendu = $this->db->prepare("DELETE FROM rendu_fini WHERE id_rendu in (select id from rendu_groupe where num_rendu in (select num_rendu from rendu WHERE date_limite <= now()-interval'30days'))");
      $deleteRendu->execute();
      $deleteRendu = $this->db->prepare("DELETE FROM rendu_groupe  where num_rendu in (select num_rendu from rendu WHERE date_limite <= now()-interval'30days')");
      $deleteRendu->execute();
      $deleteRendu = $this->db->prepare("DELETE FROM rendu WHERE date_limite <= now()-interval'30days'");
      $deleteRendu->execute();
    }

    public function deleteRendu(int $id){
      $deleteRendu = $this->db->prepare("DELETE FROM rendu_fini WHERE id_rendu in (select id from rendu_groupe where num_rendu in (select num_rendu from rendu WHERE num_rendu = :id))");
      $deleteRendu->execute([':id' => $id]);
      $deleteRendu = $this->db->prepare("DELETE FROM rendu_groupe  where num_rendu in (select num_rendu from rendu WHERE num_rendu = :id)");
      $deleteRendu->execute([':id' => $id]);
      $deleteRendu = $this->db->prepare("DELETE FROM rendu WHERE num_rendu = :id");
      $deleteRendu->execute([':id' => $id]);
    }

    public function updateRendu(int $id, string $module, array $groupes, string $date_limite, string $description, string $temps_estime){
      $updateRendu = $this->db->prepare("UPDATE rendu SET module = :module, description = :description, date_limite = :date_limite, temps_estime = :temps_estime WHERE num_rendu = :id");
      $updateRendu->execute([':module' => $module, ':description' => $description, ':date_limite' => $date_limite, 'temps_estime' => $temps_estime, ':id' => $id]);
      $deleteRendu = $this->db->prepare("DELETE FROM rendu_fini WHERE id_rendu in (select id from rendu_groupe where num_rendu in (select num_rendu from rendu WHERE num_rendu = :id))");
      $deleteRendu->execute([':id' => $id]);
      $deleteRendu = $this->db->prepare("DELETE FROM rendu_groupe  where num_rendu in (select num_rendu from rendu WHERE num_rendu = :id)");
      $deleteRendu->execute([':id' => $id]);
      foreach ($groupes as $unGroupe) {
        $insertRenduGroupe = $this->db->prepare("INSERT INTO rendu_groupe (libelle, num_rendu) VALUES (:unGroupe, :id)");
        $insertRenduGroupe->execute([':unGroupe' => $unGroupe, ':id' => $id]);
      }
    }
    /////////////////////////////////////////////
    //////             HELPERS             //////
    /////////////////////////////////////////////

    public function getElementColor($moduleName, $moduleList) {
        $color = 'lightgrey';
        foreach ($moduleList as $module){
            if(strpos($moduleName, $module->code) !== false){
                $color = $module->couleur;
                break;
            }
        }
        return $color;
    }

    public function getModuleColor(string $module){
        $req = "SELECT couleur FROM module WHERE code = '$module'";
        $query = $this->db->query($req);
        if(!$query){
            return 'lightgrey';
        }
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAllModuleColor(){
        $req = "SELECT code, couleur FROM module";
        $query = $this->db->query($req);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getLastInsertedRendu(){
        $query = "SELECT currval(pg_get_serial_sequence('rendu','num_rendu'))";
        $req = $this->db->query($query);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function groupFinded(string $group, array $groupList){
        if(strlen($group) === 7){
            $userSemester = $group[4];
        }else {
            $userSemester = $group[5];
        }
        foreach($groupList as $g){
            if(substr($g, 0, strlen($group)) == $group || $g === 'INFOS'.$userSemester){
                return true;
            }

        }
        return false;
    }

    public function customRequest(string $request){
        $req = $this->db->query($request);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }
}
