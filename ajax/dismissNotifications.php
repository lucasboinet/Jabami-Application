<?php
if(!isset($_SESSION)){
    session_start();
}
require_once '../vendor/autoload.php';
use Model\database\DAO;

if(isset($_SESSION['SESSID'])){
    $db = new DAO();
    $res = $db->notificationsLues($_SESSION['SESSID']['id']);
}
?>