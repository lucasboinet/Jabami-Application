<?php
session_start();
error_reporting(0);
require_once './vendor/autoload.php';

$router = new Model\routes\Router($_GET['url']);

$router->get('/dashboard/rendu/:groupe/:id', "rendu.display");
$router->get('/dashboard/:week/:groupe', "dashboard.display")->with('week', '[0-9]+');
$router->get('/statistiques/:week/:groupe/:eleve',"statistiques.displayWithUser")->with('week', '[0-9]+');
$router->get('/statistiques/:week/:groupe',"statistiques.display")->with('week', '[0-9]+');
$router->post('/dashboard/rendu/end', "rendu.validate");
$router->post('/dashboard/rendu/create', "rendu.create");
$router->post('/dashboard/rendu/delete', "rendu.delete");
$router->post('/dashboard/rendu/modify', "rendu.modify");
$router->post('/permissions/grant',"permissions.changePermissions");
$router->post('/permissions/delegue',"permissions.changeDelegue");
$router->get('/permissions/:groupe',"permissions.display");
$router->get('/historique', "history.display");
$router->get('/profil', "profil.display");
$router->post('/profil', "profil.validate");
$router->get('/login', "login.display");
$router->post('/login', "login.validate");
$router->get('/logout', function(){ if(isset($_SESSION)){session_destroy();} header('location: /'); });
$router->get('/error', "error.display");
$router->get('/', "index.display");

try {
    $router->start();
} catch (\Model\routes\RouterException $e) {
    $error = new \Controller\errorController();
    $error->display("La ressource que vous demandez n'existe pas");
}
