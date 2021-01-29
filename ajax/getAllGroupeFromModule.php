<?php
if(!isset($_SESSION)){
    session_start();
}
require_once '../vendor/autoload.php';
use Model\database\DAO;

if(isset($_SESSION['SESSID']) && $_SESSION['SESSID']['is_delegue'] === null && isset($_POST['module'])){
    $db = new DAO();
    $id_ens = $_SESSION['SESSID']['id'];
    $module = $_POST['module'];
    $groupeOfRendu = [];
    if(isset($_POST['groupe']) && !empty($_POST['groupe'])){
        $groupeOfRendu = explode('-', $_POST['groupe']);
    }
    $groupes = $db->customRequest("SELECT groupe FROM enseigne WHERE id_enseignant = '$id_ens' AND module = '$module'");
    
    $response = '<div class="multiselect is-fullwidth mb-4">
        <div class="select is-fullwidth selectBox" id="rendu-groupe-select">
        <select>
            <option value="0">Groupe(s) de TP Concerné(s)</option>
        </select>
        <div class="overSelect"></div>
    </div>
    <div id="checkboxes">
    <label>
        <input class="groupeCheck" type="checkbox" value="all">
        Select all
    </label>';

    foreach($groupes as $g){
        $isChecked = (in_array($g->groupe, $groupeOfRendu)) ? 'checked' : 'd';

        $response .= '<label>
            <input class="groupeCheck" type="checkbox" '. $isChecked .' value="'. $g->groupe .'">
            '. $g->groupe .'
            </label>
        ';
    }
    echo $response;
}
?>