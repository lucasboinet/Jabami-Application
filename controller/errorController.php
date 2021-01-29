<?php


namespace Controller;

use Model\View;

class errorController {

    private View $view;

    public function __construct(){
        if(!isset($_SESSION)){session_start();}
        if(!isset($_SESSION['SESSID']) && empty($_SESSION['SESSID'])){
            header('location: /login');
        }
        $this->view = new View();
    }

    public function display($message = ''){
        $this->view->assign("message", $message);
        $this->view->display("error.view.php");
    }
}