<?php
namespace Controller;

use DateTime;
use Model\View;
use Model\database\DAO;

class profilController{
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
  public function display() {
    if($_SESSION['SESSID']['is_delegue'] !== null){
      $this->view->assign('notifications', $this->db->getNotifications($_SESSION['SESSID']['id']));
      $this->view->assign('userNotif', $this->db->getAllNotifications($_SESSION['SESSID']['id']));
    }
    if($_SESSION['SESSID']['is_delegue'] !== null){
      $groupe = $_SESSION['SESSID']['groupe'];
    }else {
      $groupe = explode(', ', $_SESSION['SESSID']['groupe'])[0];
    }
    $this->view->assign('gr', $groupe);
    $this->view->display("profil.view.php");
  }

  public function validate(){
    if(!empty($_POST['ancien_pass']) && !empty($_POST['nouveau_pass']) && !empty($_POST['confirm_pass'])){
        $uga_id = htmlspecialchars($_SESSION['SESSID']['id']);
        $pass = htmlspecialchars($_POST['ancien_pass']);
        $user = $this->db->getUser($uga_id);
        if(password_verify($pass,$user->getPassword())){
          if ($_POST['nouveau_pass'] == $_POST['confirm_pass']){
            $password = password_hash($_POST['nouveau_pass'], PASSWORD_BCRYPT );
            $this->db->changerPass($_SESSION['SESSID']['id'], $password);
          }else {
            echo "error:Votre nouveau mot de passe et la confirmation sont différents";
          }
        }else {
          echo "error:Mot de passe actuel incorrect";
        }
    }else {
      echo "error:Veuillez remplir tous les champs";
    }
  }

}
 ?>
