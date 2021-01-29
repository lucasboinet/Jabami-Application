<?php
namespace Controller;

use Model\View;

class indexController {
    private $view;

    public function __construct(){
        $this->view = new View();
    }

    public function display(){
        $this->view->display("index.view.php");
    }
}