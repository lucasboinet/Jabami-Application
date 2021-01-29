<?php
if(!isset($_SESSION)){
    session_start();
}
require_once '../vendor/autoload.php';
use Model\database\DAO;

if(isset($_SESSION['SESSID']) && isset($_POST['filter_value']) && isset($_POST['id']) && isset($_POST['groupe'])){
    $db = new DAO();
    $id = $_POST['id'];
    $groupe = $_POST['groupe'];
    $renduFini = $db->getRenduFiniByGroupe($id, $groupe);
    $rendu = $db->getRendu($id, $groupe);
    $filterValue = intval($_POST['filter_value']);
    $eleves = ['true' => [], 'false' => []];

    foreach($renduFini as $r){
        $groupeEleve = $db->getUser($r->getIdEleve())->getGroupe();
        if( $groupeEleve === $groupe || substr($groupeEleve, 0, strlen($groupeEleve)-1) ){
            $eleves['true'][] = [$db->getUser($r->getIdEleve()), $r->getDate(), $r->getTemps()];
        }
    }
    foreach($db->getUsersByGroupe($groupe) as $e){
        if(!in_array($e, $eleves['true'])){
            $eleves['false'][] = [$e];
        }
    }

    switch($filterValue){
        case 1:
            unset($eleves["false"]);
            break;
        case 2:
            unset($eleves["true"]);
            break;
        default:
            break;
    }

    $response = '
        <table class="table is-bordered is-striped is-hoverable">
            <thead>
                <tr>
                    <th>Rendu ?</th>
                    <th>Date</th>
                    <th>Temps</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Identifiant</th>
                    <th>Groupe</th>
                </tr>
            </thead>
            <tbody>';
            foreach($eleves as $eleve){
                $key = array_search($eleve,$eleves);
                foreach($eleve as $e){
                    $status =  ($key == 'true') ? '<span style="color: green">Terminé</span>' : '<span style="color: red">Pas terminé</span>';
                    $date = (sizeof($e) > 1) ? $e[1]->format('d-m-Y') : '/';
                    $temps = (sizeof($e) > 1) ? $e[2] . 'h' : '/';
                    $response .= '
                        <tr>
                            <th>'. $status .'</th>
                            <td>'.$date .'</td>
                            <td>'. $temps .'</td>
                            <td>'. $e[0]->getNom() .'</td>
                            <td>'. $e[0]->getPrenom() .'</td>
                            <td>'. $e[0]->getUgaId() .'</td>
                            <td>'. $e[0]->getGroupe() .'</td>
                        </tr>';
                }    
            }
            $response .= '</tbody></table>';

            echo $response;
}
?>