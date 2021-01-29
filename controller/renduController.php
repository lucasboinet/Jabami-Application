<?php
namespace Controller;

use Model\View;
use Model\database\DAO;
use Model\Rendu;

class renduController {
    private $view;
    private $db;

    public function __construct(){
        if(!isset($_SESSION)){session_start();}
        if(!isset($_SESSION['SESSID']) && empty($_SESSION['SESSID'])){
            header('location: /login');
        }
        $this->db = new DAO();
        $this->view = new View();
    }

    public function display(string $groupe, int $id){
        $renduFini = $this->db->getRenduFiniByGroupe($id, $groupe);
        $rendu = $this->db->getRendu($id, $groupe);
        $groupeOK = in_array($groupe,explode(", ", $_SESSION['SESSID']['groupe']));
        if(!$groupeOK){
            $groupeOK = (preg_match("([A-Z])", substr($groupe, strlen($groupe)-1, strlen($groupe))) == 1);
        }
        if($_SESSION['SESSID']['is_delegue'] !== null){
            $this->error = new errorController();
            $this->error->display("Erreur: Vous n'avez pas la permissions");
        }
        if(!$rendu || !$groupeOK){
            $this->error = new errorController();
            $this->error->display("Erreur: Ce groupe ne fait pas partie de vos/votre groupe(s)");
        }
        $eleves = ['true' => [], 'false' => []];

        foreach($renduFini as $r){
            $groupeEleve = $this->db->getUser($r->getIdEleve())->getGroupe();
            if( $groupeEleve === $groupe || substr($groupeEleve, 0, strlen($groupeEleve)-1) ){
                $eleves['true'][] = [$this->db->getUser($r->getIdEleve()), $r->getDate(), $r->getTemps()];
            }
        }

        foreach($this->db->getUsersByGroupe($groupe) as $e){
            if(!in_array($e, $eleves['true'])){
                $eleves['false'][] = [$e];
            }
        }

        $userModule = [];

        if($_SESSION['SESSID']['is_delegue'] === null){
            $userModule = $this->db->getModuleOfEns($_SESSION['SESSID']['id'], $groupe);
        }else {
            $currentUserGroup = $_SESSION['SESSID']['groupe'];
            if(strlen($currentUserGroup) === 7){
                $userSemester = $currentUserGroup[4];
            }else {
                $userSemester = $currentUserGroup[5];
            }
            $moduleType = 'M'.$userSemester;
            $modules = $this->db->customRequest("SELECT module FROM enseigne WHERE groupe LIKE '$currentUserGroup%' AND module LIKE '$moduleType%'");
            foreach($modules as $module){
                $userModule[] = $module->module;
            }
        }

        $this->view->assign('gr', $groupe);
        $this->view->assign('tpGroupe', $this->getUserTpGroup());
        $this->view->assign('rendu', $rendu);
        $this->view->assign('userModule', $userModule);
        $this->view->display("rendu.view.php");
    }

    public function validate(){
        $done = $_POST['done'] == "true" ? true : false;
        $idRendu = $_POST['id_rendu'];
        if (isset($_POST['tps']) && preg_match('/^([1-9]\d*(\.|\,)\d*|0?(\.|\,)\d*[1-9]\d*|[1-9]\d*)$/', $_POST['tps']) === 1){
              $tps = $_POST['tps'];
              if(isset($idRendu)){
                $user_id = $_SESSION['SESSID']['id'];
                if(!$done){
                    $this->db->removeRenduFini($user_id,intval($idRendu));
                }else{
                    $temps = $tps . 'h';
                    $this->db->addRenduFini($user_id,intval($idRendu), $temps);
                }
                $done;
            }else {
                $this->error = new errorController();
                $this->error->display("Erreur: Impossible d'indiqué ce rendu comme terminé");
            }
        }else {
            echo "error:Verifier la saisie des informations";
        }
    }

    public function create(){
        if(isset($_POST['mo']) && isset($_POST['gr'])  && isset($_POST['t']) && isset($_POST['d']) && isset($_POST['de'])){
            if(empty($_POST['mo']) || empty($_POST['gr']) || empty($_POST['d']) || empty($_POST['t']) || empty($_POST['de'])){
                echo "Verifier la saisie des informations";
            }else {
                if(preg_match('/^([1-9]\d*(\.|\,)\d*|0?(\.|\,)\d*[1-9]\d*|[1-9]\d*)$/', $_POST['t']) === 1){
                    $module = $_POST['mo'];
                    $groupe = explode(',', $_POST['gr']);
                    $date = $_POST['d'];
                    $temps = htmlspecialchars($_POST['t'] . 'h');
                    $desc = htmlspecialchars($_POST['de']);
                    $this->db->createRendu($module, $groupe, $date, $temps, $desc);
                    //insert notification
                    $message = "Nouveau rendu en $module, à faire pour le $date";
                    foreach($groupe as $g){
                        foreach($this->db->getUsersByGroupe($g) as $u){
                            $this->db->addNotification('rendu',$message,$u->getUgaId());
                        }
                    }
                    echo $this->db->getLastInsertedRendu()[0]->currval."-".$this->db->getModuleColor($module)[0]->couleur;
                }else {
                    echo "Verifier la saisie des informations";
                }
            }
        }else {
            echo "Une erreur c'est produite, veuillez réessayer";
        }
    }

    public function modify(){
        if(isset($_POST['rendu_id']) && isset($_POST['module']) && isset($_POST['groupe']) && isset($_POST['tps']) && isset($_POST['desc']) && isset($_POST['date'])){
            if(empty($_POST['rendu_id']) || empty($_POST['module']) || empty($_POST['groupe']) || empty($_POST['tps']) || empty($_POST['desc']) || empty($_POST['date'])){
                echo "error:Verifier la saisie des informations";
            }else {
                if(preg_match('/^([1-9]\d*(\.|\,)\d*|0?(\.|\,)\d*[1-9]\d*|[1-9]\d*)$/', $_POST['tps']) === 1){
                    $id_rendu = intval($_POST['rendu_id']);
                    $module = htmlspecialchars($_POST['module']);
                    $groupe = explode(',', $_POST['groupe']);
                    $date = $_POST['date'];
                    $temps = htmlspecialchars($_POST['tps'] . 'h');
                    $desc = htmlspecialchars($_POST['desc']);
                    $this->db->updateRendu($id_rendu, $module, $groupe, $date, $desc, $temps);
                    //insert notification
                    $message = "Un rendu en $module à été modifié, si il était terminé, il ne l'est plus vous devrez le réindiquer comme terminé !";
                    foreach($groupe as $g){
                        foreach($this->db->getUsersByGroupe($g) as $u){
                            $this->db->addNotification('rendu_modif',$message,$u->getUgaId());
                        }
                    }
                    echo '<h1 class="title m-0">Module : '. $module .'</h1>
                                <p class="mt-3">Temps estimé pour le réaliser: <code>'.  $temps .'</code></p>
                                <p class="mb-3">A faire pour le <code>'. $date .'</code></p>
                                <p>Description : '. $desc .'</p>';
                }else {
                    echo "error:Verifier la saisie des informations";
                }
            }
        }else {
            echo "error:Une erreur c'est produite, veuillez réessayer";
        }
    }

    private function getUserTpGroup(): array {
        $allGroups = explode(', ', $_SESSION['SESSID']['groupe']);
        $mainGroup = [];
        foreach ($allGroups as $g){
            if(!in_array($g, $mainGroup)){
                $mainGroup[] = $g;
            }
        }
        return $mainGroup;
    }

    public function delete(){
      if (isset($_POST['id_rendu']) && isset($_SESSION)){
        $this->db->deleteRendu($_POST['id_rendu']);
        $groupe = explode(', ', $_SESSION['SESSID']['groupe'])[0];
        echo $groupe;
      }
    }
}
