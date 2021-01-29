<?php
namespace Controller;

use Model\View;
use Model\database\DAO;

class loginController {
    private $view;
    private $db;

    public function __construct(){
        if(isset($_SESSION['SESSID']) && !empty($_SESSION['SESSID'])){
            header('location: /dashboard/1/'.explode(', ', $_SESSION['SESSID']['groupe'])[0]);
        }
        $this->db = new DAO();
        $this->view = new View();
    }

    public function display() {
        $this->view->display("login.view.php");
    }

    public function validate(){
        if(!empty($_POST['uga_id']) && !empty($_POST['password'])){
            $uga_id = htmlspecialchars($_POST['uga_id']);
            $pass = htmlspecialchars($_POST['password']);
            $res = $this->db->getUser($uga_id);
            if($res !== null){
                if(password_verify($pass,$res->getPassword())){
                    $_SESSION['SESSID'] = ['id' => $res->getUgaId(), 'groupe' => $res->getGroupe(), 'is_delegue' => $res->isDelegue(), 'have_perm' => $res->havePermissions(), 'nom' => $res->getNom(), 'prenom' => $res->getPrenom()];
                    header('location: /dashboard/1/'.explode(', ', $_SESSION['SESSID']['groupe'])[0]);
                }else {
                    $this->view->assign("errorMessage", "Identifiant ou mot de passe  incorrect");
                    $this->view->display("login.view.php");
                }
            }else {
                $this->view->assign("errorMessage", "Identifiant ou mot de passe incorrect");
                $this->view->display("login.view.php");
            }
        }else {
            $this->view->assign("errorMessage", "Veuillez remplir tous les champs");
            $this->view->display("login.view.php");
        }
    }

}
