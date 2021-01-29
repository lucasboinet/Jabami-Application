<?php

namespace Controller;

use DateTime;
use Model\View;
use Model\database\DAO;
use Model\Agenda;

class statistiquesController{
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

    public function display(int $week, string $groupe) {
        if(!$_SESSION['SESSID']['have_perm']){
            $this->error = new errorController();
            $this->error->display("Erreur: vous n'avez pas les permissions.");
        }
        if($week <= 1){
            $week = 1;
        }
        if(!$this->db->groupFinded($groupe, explode(", ",$_SESSION['SESSID']['groupe']))){
            $this->error = new errorController();
            $this->error->display("Erreur: Ce groupe ne fait pas partie de vos/votre groupe(s)");
        }

        $agenda = new Agenda($week);

        $currentYear = date('Y', strtotime('+'.($week - 1).'week'));
        $weekNumber = date('W', strtotime('+'.($week - 1).'week'));

        $currentWeek = $agenda->getWeekStartEnd($currentYear, $weekNumber);
        $first_day = $currentWeek->first_day->format('Y-m-d');
        $last_day = $currentWeek->last_day->format('Y-m-d');

        $weekRendu = $this->db->customRequest("SELECT module, temps_estime, date_limite FROM rendu WHERE num_rendu IN (SELECT num_rendu FROM rendu_groupe WHERE libelle LIKE '$groupe%') AND date_limite BETWEEN '$first_day' AND '$last_day'");

        $weekCours = $agenda->getCal($groupe);



        //================================================
        //=         TRAITEMENT DES DONNEES               =
        //================================================

        $dataCoursRendus = [];

        $dataRendu = [];

        foreach ($weekCours as $date){
            foreach ($date as $heure){
                if (is_array($heure)) {
                   foreach ($heure as $cours){
                        $title =explode(' ', $cours->getCode())[0];
                        if(!array_key_exists($title, $dataCoursRendus)){
                            $dataCoursRendus[$title] = 0;
                        }
                        $dataCoursRendus[$title] += $cours->getDuration();
                   }
                } else {
                    $title =explode(' ', $heure->getCode())[0];
                    if(!array_key_exists($title, $dataCoursRendus)){
                        $dataCoursRendus[$title] = 0;
                    }
                    $dataCoursRendus[$title] += $heure->getDuration();
                }
            }
        }

        foreach($weekRendu as $rendu){
            if(!array_key_exists($rendu->module, $dataCoursRendus)){
                $dataCoursRendus[$rendu->module] = 0;
            }
            $dataCoursRendus[$rendu->module] += (float) explode('h', $rendu->temps_estime)[0];
        }

        $heureRenduCoursModule = [];
        foreach($dataCoursRendus as $key => $value){
            $heureRenduCoursModule[] = ["label" => $key, "y" => $value];
        }

        $this->view->assign('eleveList', $this->db->getUsersByGroupe($groupe));
        $this->view->assign('week', $week);
        $this->view->assign('gr', $groupe);
        $this->view->assign('dataCoursRendus', $heureRenduCoursModule);
        $this->view->assign('tempsEstimeRendu', $this->getTempsEstimeRendu($groupe));
        $this->view->assign('tempsReelRendu', $this->getTempsReelRendu($groupe));
        $this->view->assign('moyenne',$this->getMoyenne($weekRendu, $weekCours));
        $this->view->assign('chargeTravailCours', $this->getChargeTravailCours($first_day, $last_day, $weekCours));
        $this->view->assign('chargeTravailRendu', $this->getChargeTravailRendu($first_day, $last_day, $weekRendu));
        $this->view->assign('tdGroupe', $this->getUserTdGroup());
        $this->view->assign('tpGroupe', $this->getUserTpGroup());
        $this->view->display("statistiques.view.php");
    }

    public function displayWithUser($week, $groupe, $uga_id){
        if(!$_SESSION['SESSID']['have_perm']){
            $this->error = new errorController();
            $this->error->display("Erreur: vous n'avez pas les permissions.");
        }
        if($week <= 1){
            $week = 1;
        }
        if(!$this->db->groupFinded($groupe, explode(", ",$_SESSION['SESSID']['groupe']))){
            $this->error = new errorController();
            $this->error->display("Erreur: Ce groupe ne fait pas partie de vos/votre groupe(s)");
        }

        $userExist = $this->db->customRequest("SELECT * FROM eleve WHERE uga_id = '$uga_id' AND groupe LIKE '$groupe%'");

        if(empty($userExist)){
            $this->error = new errorController();
            $this->error->display("Erreur: Cet eleve n'est pas dans ce groupe");
        }

        $user = $userExist[0];

        $agenda = new Agenda($week);

        $currentYear = date('Y', strtotime('+'.($week - 1).'week'));
        $weekNumber = date('W', strtotime('+'.($week - 1).'week'));

        $currentWeek = $agenda->getWeekStartEnd($currentYear, $weekNumber);
        $first_day = $currentWeek->first_day->format('Y-m-d');
        $last_day = $currentWeek->last_day->format('Y-m-d');

        $weekRendu = $this->db->customRequest("SELECT module, temps_estime, date_limite FROM rendu WHERE num_rendu IN (SELECT num_rendu FROM rendu_groupe WHERE libelle LIKE '$groupe%') AND date_limite BETWEEN '$first_day' AND '$last_day'");

        $weekCours = $agenda->getCal($groupe);

        //================================================
        //=         TRAITEMENT DES DONNEES               =
        //================================================

        $dataCoursRendus = [];

        foreach ($weekCours as $date){
            foreach ($date as $heure){
                if (is_array($heure)) {
                   foreach ($heure as $cours){
                        $title =explode(' ', $cours->getCode())[0];
                        if(!array_key_exists($title, $dataCoursRendus)){
                            $dataCoursRendus[$title] = 0;
                        }
                        $dataCoursRendus[$title] += $cours->getDuration();
                   }
                } else {
                    $title =explode(' ', $heure->getCode())[0];
                    if(!array_key_exists($title, $dataCoursRendus)){
                        $dataCoursRendus[$title] = 0;
                    }
                    $dataCoursRendus[$title] += $heure->getDuration();
                }
            }
        }

        foreach($weekRendu as $rendu){
            if(!array_key_exists($rendu->module, $dataCoursRendus)){
                $dataCoursRendus[$rendu->module] = 0;
            }
            $dataCoursRendus[$rendu->module] += (float) explode('h', $rendu->temps_estime)[0];
        }

        $heureRenduCoursModule = [];
        foreach($dataCoursRendus as $key => $value){
            $heureRenduCoursModule[] = ["label" => $key, "y" => $value];
        }

        $this->view->assign('eleveNom', $uga_id);
        $this->view->assign('eleveList', $this->db->getUsersByGroupe($groupe));
        $this->view->assign('week', $week);
        $this->view->assign('gr', $groupe);
        $this->view->assign('dataCoursRendus', $heureRenduCoursModule);
        $this->view->assign('tempsEstimeRendu',$this->getTempsEstimeRendu($groupe));
        $this->view->assign('tempsReelRendu',$this->getTempsReelRendu($groupe));
        $this->view->assign('moyenne',$this->getMoyenne($weekRendu, $weekCours));
        $this->view->assign('chargeTravailCours', $this->getChargeTravailCours($first_day, $last_day, $weekCours));
        $this->view->assign('chargeTravailRendu', $this->getChargeTravailRendu($first_day, $last_day, $weekRendu));
        $this->view->assign('tdGroupe', $this->getUserTdGroup());
        $this->view->assign('tpGroupe', $this->getUserTpGroup());
        $this->view->assign('rapportRenduEffectues', $this->getRapportRenduEffectues($user->uga_id,$user->groupe));
        $this->view->assign('comparaisonRenduEffectues', $this->getComparaisonRenduEffectues($user->uga_id,$user->groupe));
        $this->view->display("statistiques.view.php");
    }

    private function getRapportRenduEffectues($uga_id,$groupe) {
        $nbRendus = sizeof($this->db->getAllRendusFini($uga_id));
        $nbRendusTotal = sizeof($this->db->getRendusByGroupe($groupe));


        $final = [["y"=> $nbRendusTotal - $nbRendus, "label"=> "Rendus à faire"],["y"=> $nbRendus, "label"=> "Rendus effecués"]];
        return $final;
    }

    private function getComparaisonRenduEffectues($uga_id,$groupe) {
        $rendus = $this->db->getAllRendusFini($uga_id);

        $totalTempsRenduFini = [];
        foreach($rendus as $r){
            $id = $r->getIdRendu();
            $rendu = $this->db->customRequest("SELECT * from rendu where num_rendu IN (SELECT num_rendu FROM rendu_groupe WHERE id=$id)")[0];
            if(!array_key_exists($rendu->module, $totalTempsRenduFini)){
                $totalTempsRenduFini[$rendu->module] = [floatval($r->getTemps()),1];
            }else {
                $totalTempsRenduFini[$rendu->module][0] = $totalTempsRenduFini[$rendu->module][0] + floatval($r->getTemps());
                $totalTempsRenduFini[$rendu->module][1]++;
            }
        }

        $renduOfGroupe = $this->db->getRendusByGroupe($groupe);

        $totalTempsRendu = [];
        foreach($renduOfGroupe as $rendu){
            if (array_key_exists($rendu->getModule(),$totalTempsRenduFini)) {
                if(!array_key_exists($rendu->getModule(), $totalTempsRendu)){
                    $totalTempsRendu[$rendu->getModule()] = [floatval($rendu->getTempsEstime()),1];
                }else {
                    $totalTempsRendu[$rendu->getModule()][0] = $totalTempsRendu[$rendu->getModule()][0] + floatval($rendu->getTempsEstime());
                    $totalTempsRendu[$rendu->getModule()][1]++;
                }
            }
        }

        $ArrayRendusFini = [];
        $ArrayRendus = [];


        foreach($totalTempsRenduFini as $key => $value){
            $ArrayRendusFini[] = ["y" => $value[0]/$value[1], "label" => $key];
            $ArrayRendus[] = ["y" => $totalTempsRendu[$key][0]/$totalTempsRendu[$key][1], "label" => $key];
        }
        $finalArray= [$ArrayRendusFini,$ArrayRendus];

        return $finalArray;
    }

    private function getTempsEstimeRendu($groupe){

        //TempsEstimeRendu
        $renduOfGroupe = $this->db->getRendusByGroupe($groupe);
        $totalTempsRendu = [];

        foreach($renduOfGroupe as $rendu){
            if(!array_key_exists($rendu->getModule(), $totalTempsRendu)){
                $totalTempsRendu[$rendu->getModule()] = [floatval($rendu->getTempsEstime()),1];
            }else {
                $totalTempsRendu[$rendu->getModule()][0] = $totalTempsRendu[$rendu->getModule()][0] + floatval($rendu->getTempsEstime());
                $totalTempsRendu[$rendu->getModule()][1]++;
            }
        }

        $finalArray = [];

        foreach($totalTempsRendu as $key => $value){
            $finalArray[] = ["y" => $value[0]/$value[1], "label" => $key];
        }

        return $finalArray;
    }

    private function getTempsReelRendu($groupe){
        $renduOfGroupe = $this->db->getRendusByGroupe($groupe);
        $totalTempsReelRendu = [];

        foreach($renduOfGroupe as $rendu){
            $renduFini = $this->db->getRenduFiniByGroupe($rendu->getId(), $groupe);
            foreach($renduFini as $r){
                if(!array_key_exists($rendu->getModule(), $totalTempsReelRendu)){
                    $totalTempsReelRendu[$rendu->getModule()] = [floatval($r->getTemps()),1];
                }else {
                    $totalTempsReelRendu[$rendu->getModule()][0] = $totalTempsReelRendu[$rendu->getModule()][0] + floatval($r->getTemps());
                    $totalTempsReelRendu[$rendu->getModule()][1]++;
                }
            }
        }

        $finalArray = [];

        foreach($totalTempsReelRendu as $key => $value){
            $finalArray[] = ["y" => $value[0]/$value[1], "label" => $key];
        }

        return $finalArray;
    }

    private function getMoyenne($weekRendu, $weekCours): array {
        $statsRenduCours = [];

        foreach($weekRendu as $r){
            $statsRenduCours[] = floatval($r->temps_estime);
        }

        $finalArray = [];
        $total = 0;

        foreach($statsRenduCours as $arr){
            $total += $arr;
        }

        $finalArray[] = ["label" => 'Rendus', "y" => $total/7];

        $statsRenduCours = [];
        foreach ($weekCours as $key => $date){
            foreach ($date as $heure){
                if (is_array($heure)) {
                    foreach ($heure as $cours){
                        $statsRenduCours[]= $cours->getDuration();
                    }
                 } else {
                    $statsRenduCours[]= $heure->getDuration();
                 }
            }
        }

        $total = 0;
        foreach($statsRenduCours as $arr){
            $total += $arr;
        }

        $finalArray[] = ["label" => 'Cours', "y" => $total/7];

        return $finalArray;

    }

    private function getChargeTravailRendu($first_day, $last_day, $weekRendu): array {
        $explodeFirstDay = explode('-', $first_day);
        $explodeLastDay = explode('-', $last_day);
        $statsRendu = [];

        for($i = (int) $explodeFirstDay[2]; $i <= (int) $explodeLastDay[2]; $i++){
            $day = ($i < 10) ? '0'.$i : $i;
            $statsRendu[$day . '-' . $explodeFirstDay[1] . '-' . $explodeFirstDay[0]] = [];
        }

        foreach($weekRendu as $r){
            $explodeDate = explode('-', $r->date_limite);
            $statsRendu[$explodeDate[2] . '-' . $explodeDate[1] . '-' . $explodeDate[0]][] = floatval($r->temps_estime);
        }

        $finalArray = [];

        foreach($statsRendu as $key => $value){
            $total = 0;
            foreach($value as $arr){
                $total += $arr;
            }
            $finalArray[] = ["label" => $key, "y" => $total];
        }

        return $finalArray;
    }

    private function getChargeTravailCours($first_day, $last_day, $allCours): array {
        $explodeFirstDay = explode('-', $first_day);
        $explodeLastDay = explode('-', $last_day);
        $coursRendu = [];

        for($i = (int) $explodeFirstDay[2]; $i <= (int) $explodeLastDay[2]; $i++){
            $day = ($i < 10) ? '0'.$i : $i;
            $coursRendu[$day . '-' . $explodeFirstDay[1] . '-' . $explodeFirstDay[0]] = [];
        }

        foreach($allCours as $c){
            foreach($c as $a){
                if(is_array($a)){
                    foreach($a as $arr){
                        $coursRendu[$arr->getDebut()->format('d-m-Y')][] = $arr->getDuration();
                    }
                }else {
                    $coursRendu[$a->getDebut()->format('d-m-Y')][] = $a->getDuration();
                }
            }
        }

        $finalArray = [];

        foreach($coursRendu as $key => $value){
            $total = 0;
            foreach($value as $arr){
                $total += $arr;
            }
            $finalArray[] = ["label" => $key, "y" => $total];
        }

        return $finalArray;
    }

    private function getUserTdGroup(): array {
        $allGroups = explode(', ', $_SESSION['SESSID']['groupe']);
        $mainGroup = [];
        foreach ($allGroups as $g){
            if(!in_array(substr($g, 0, strlen($g)-1), $mainGroup)){
                $mainGroup[] = substr($g, 0, strlen($g)-1);
            }
        }
        return $mainGroup;
    }

    private function getUserTpGroup(): array {
        $allGroups = explode(', ', $_SESSION['SESSID']['groupe']);
        $mainGroup = [];
        foreach ($allGroups as $g){
            if(!in_array($g, $mainGroup)){
                $mainGroup[] = $g;
            }
        }
        return $mainGroup;
    }

}

?>
