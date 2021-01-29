<?php
namespace Controller;

use DateTime;
use Model\View;
use Model\database\DAO;

class permissionsController {

    private View $view;
    private DAO $db;

    public function __construct(){
        if(!isset($_SESSION)){session_start();}
        if(!isset($_SESSION['SESSID']) && empty($_SESSION['SESSID'])){
            header('location: /login');
        }
        $this->db = new DAO();
        $this->view = new View();
    }

    public function display(string $groupe) {
        if(($_SESSION['SESSID']['is_delegue'] === true && $_SESSION['SESSID']['have_perm'] === false) || $_SESSION['SESSID']['is_delegue'] === false){
            $this->error = new errorController();
            $this->error->display("Erreur: vous n'avez pas les permissions.");
        }
        if(!$this->db->groupFinded($groupe, explode(", ",$_SESSION['SESSID']['groupe']))){
            $this->error = new errorController();
            $this->error->display("Erreur: Ce groupe ne fait pas partie de vos/votre groupe(s)");
        }
        if($_SESSION['SESSID']['is_delegue'] !== null){
            $this->view->assign('notifications', $this->db->getNotifications($_SESSION['SESSID']['id']));
        }

        $eleves = $this->db->getUsersByGroupe($groupe);

        $this->view->assign('tdGroupe', $this->getUserTdGroup());
        $this->view->assign('tpGroupe', $this->getUserTpGroup());
        $this->view->assign('eleves', $eleves);
        $this->view->assign('gr', $groupe);
        $this->view->display("permissions.view.php");
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

    private function getUserTdGroup(): array {
        $allGroups = explode(', ', $_SESSION['SESSID']['groupe']);
        $mainGroup = [];
        foreach ($allGroups as $g){
            if(!in_array(substr($g, 0, strlen($g)-1), $mainGroup)){
                $mainGroup[] = substr($g, 0, strlen($g)-1);
            }
        }
        return $mainGroup;
    }

    public function changePermissions(){
        if(isset($_POST['id_eleve']) && isset($_SESSION['SESSID'])){
            $this->db->changerPermissions($_POST['id_eleve']);
            echo "Permissions changées";
            $message = $this->db->getPermissions($_POST['id_eleve']) ? "Vous avez la permissions d'ajouter des rendus" : "Vous n'avez plus la permission d'ajouter des rendus";
            $this->db->addNotification('perm',$message,$_POST['id_eleve']);
        }else {
            $this->error = new errorController();
            $this->error->display("Impossible d'effectuer cette action");
        }
    }
}