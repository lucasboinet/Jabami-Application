<?php
namespace Controller;

use DateTime;
use Model\Agenda;
use Model\View;
use Model\database\DAO;

class dashboardController {

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

    public function display(int $week, string $groupe) {
        if($week <= 1){
            $week = 1;
        }
        $agenda = new Agenda($week);
        if(!$this->db->groupFinded($groupe, explode(", ",$_SESSION['SESSID']['groupe']))){
            $this->error = new errorController();
            $this->error->display("Ce groupe ne fait pas partie de vos/votre groupe(s)");
        }

        $rendus = $this->db->getRendusByGroupe($groupe);

        if($_SESSION['SESSID']['is_delegue'] !== null){
            $this->view->assign('notifications', $this->db->getNotifications($_SESSION['SESSID']['id']));
            foreach($rendus as $r){
                if($this->db->getRenduFiniById($_SESSION['SESSID']['id'], $r->getId()) !== null){
                    $r->{"is_done"} = true;
                }else {
                    $r->{"is_done"} = false;
                }
            }
        }

        $userModuleArr = [];
        $userGroupeModuleArr = [];

        if($_SESSION['SESSID']['is_delegue'] === null){
            $ens = $_SESSION['SESSID']['id'];
            $userAllModule = $this->db->customRequest("SELECT distinct module FROM enseigne WHERE id_enseignant = '$ens' AND module NOT LIKE 'MRESP' ORDER BY module ASC");
            foreach($userAllModule as $module){
                $userModuleArr[] = $module->module;
            }
            $userGroupModule = $this->db->customRequest("SELECT distinct module FROM enseigne WHERE id_enseignant = '$ens' AND module NOT LIKE 'MRESP' AND groupe LIKE '$groupe%' ORDER BY module ASC");
            foreach($userGroupModule as $module){
                $userGroupeModuleArr[] = $module->module;
            }
        }else {
            $currentUserGroup = $_SESSION['SESSID']['groupe'];
            if(strlen($currentUserGroup) === 7){
                $userSemester = $currentUserGroup[4];
            }else {
                $userSemester = $currentUserGroup[5];
            }
            $moduleType = 'M'.$userSemester;
            $modules = $this->db->customRequest("SELECT module FROM enseigne WHERE groupe LIKE '$currentUserGroup%' AND module LIKE '$moduleType%' ORDER BY module ASC");
            foreach($modules as $module){
                $userModuleArr[] = $module->module;
            }
        }
        
        $this->view->assign('tdGroupe', $this->getUserTdGroup());
        $this->view->assign('tpGroupe', $this->getUserTpGroup());
        $this->view->assign('userModule', $userModuleArr);
        $this->view->assign('userGroupeModule', $userGroupeModuleArr);
        $this->view->assign('data', $agenda->getCal($groupe));
        $this->view->assign('gr', $groupe);
        $this->view->assign('rendus', $rendus);
        $this->view->assign('agenda', $agenda);
        $this->view->assign('week', $week);
        $this->view->display("dashboard.view.php");
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

}
