<?php
if(!isset($_SESSION)){
    session_start();
}
require_once '../vendor/autoload.php';
use Model\database\DAO;

if(isset($_POST['id_rendu']) && isset($_SESSION['SESSID'])){
    $id_rendu = intval($_POST['id_rendu']);
    $groupe = $_SESSION['SESSID']['groupe'];

    $db = new DAO();
    $rendu = $db->getRendu($id_rendu, $groupe);
    $response = '<div id="seeMoreRendu">';
    $response .= '<h3 class="title">'. $rendu->getModule() .'</h3>';
    $response .= '<p id="seeMoreRenduDesc">'. $rendu->getDescription() .'</p>';
    $response .= '<p>Temps estimé pour le réaliser : '. $rendu->getTempsEstime() .'</p>';
    $response .= '<p>A faire pour le <code>'. $rendu->getDate()->format('d-m-Y') .'</code></p>';
    if($_SESSION['SESSID']['have_perm'] === true && $_SESSION['SESSID']['is_delegue'] !== null && $rendu->addedByUser()){
        $response .= '<button class="button is-danger mt-3" onclick="supprimerRendu('. $rendu->getId() .')">Supprimer</button>';
    }
    $response .= '</div>';

    echo $response;
}   
?>