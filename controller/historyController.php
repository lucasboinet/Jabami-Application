<?php
namespace Controller;

use Model\View;
use Model\database\DAO;

class historyController{
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

    public function display(){
        if($_SESSION['SESSID']['is_delegue'] !== null){
            $rendusFini = $this->db->getAllRendusFini($_SESSION['SESSID']['id']);
            $rendus = $this->db->getRendusByGroupe($_SESSION['SESSID']['groupe']);
            $isRenduFini = ['true' => [], 'false' => []];
            foreach ($rendus as $value) {
              $rendu = $this->db->getRenduFiniById($_SESSION['SESSID']['id'], $value->getId());
              if (in_array($rendu, $rendusFini)){
                $id = array_search($rendu, $rendusFini);
                $rf = $rendusFini[$id];
                $isRenduFini['true'][] = [$value, $rf->getDate(), $rf->getTemps()];
              } else {
                $isRenduFini['false'][] = [$value];
              }
            }
            $this->view->assign('isRenduFini', $isRenduFini);
            $this->view->assign('rendus', $rendus);
          }else {
            $this->view->assign('renduOfEns', $this->db->getRenduOfEns($_SESSION['SESSID']['id']));
          }
          if($_SESSION['SESSID']['is_delegue'] !== null){
            $groupe = $_SESSION['SESSID']['groupe'];
          }else {
            $groupe = explode(', ', $_SESSION['SESSID']['groupe'])[0];
          }
          $this->view->assign('gr', $groupe);
          $this->view->display("history.view.php");
    }

    public function delete(){
        if (isset($_POST['id_rendu']) && isset($_SESSION)){
          $this->db->deleteRendu($_POST['id_rendu']);
        }
      }
}
?>