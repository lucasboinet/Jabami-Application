<?php


namespace Model;

use DateTime;
use ICal\ICal;
use Model\database\DAO;
use Model\Module;

class Agenda {
    private Ical $ical;
    private array $modules = [];
    private bool $joignable = true;
    private $currentWeek;
    private DAO $db;

    public function __construct(int $week){
        $this->db = new DAO();
        $this->ical = new ICal(false, array(
            'defaultSpan'                 => 2,     // Default value
            'defaultTimeZone'             => 'UTC',
            'defaultWeekStart'            => 'MO',  // Default value
            'disableCharacterReplacement' => false, // Default value
            'filterDaysAfter'             => null,  // Default value
            'filterDaysBefore'            => null,  // Default value
            'skipRecurrence'              => false, // Default value
        ));
        if($week < 1) $week = 1;
        $currentYear = date('Y', strtotime('+'.($week - 1).'week'));
        $weekNumber = date('W', strtotime('+'.($week - 1).'week'));
        $this->currentWeek = $this->getWeekStartEnd($currentYear, $weekNumber);
        try {
            $this->ical->initUrl('https://ade-uga.grenet.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?resources=41958,41957,41232,41231,41209,41208,41201,41200,41571,41451,40681,40270,40665,40820,40461,40460,42601,42597,41526,41515,41816,41815,41340,41328,41831,41830,41828,41827,41825,41824,41822,41821,40457,40456,40455,40454,40453,40452,40451,40450,40442,40441,40440,40439,40438,40437,40436,40435&projectId=8&calType=ical&firstDate='.$this->currentWeek->first_day->format('Y-m-d').'&lastDate='.$this->currentWeek->last_day->format('Y-m-d'));
        }catch (\Exception $e){
            $this->joignable = false;
        }
    }

    public function isJoignable(){
        return $this->joignable;
    }

    public function getCal(string $group) {
        if(preg_match("(^INFO[0-9]?$)", $group)){
            header("location: /404");
        }
        $filteredData = $this->initializeFilteredArray();
        $dataModule = [];
        $data = $this->ical->eventsFromRange($this->currentWeek->first_day->format('Y-m-d'), $this->currentWeek->last_day->format('Y-m-d'));
        $moduleList = $this->db->getAllModuleColor();
        foreach($data as $d){
            if(preg_match_all("(INFO[0-9A-Za-z]+)", $d->description, $desc) || preg_match_all("(INFOS[1-4])|(INFOS[1-4]d)", $d->description, $desc)){
                if($this->db->groupFinded($group, $desc[0])){
                    $de = array_diff(explode("\n",$d->description),$desc[0]);
                    array_pop($de);
                    array_shift($de);
                    $start = new DateTime($d->dtstart);
                    $end = new DateTime($d->dtend);
                    $start->modify('+1 hour');
                    $end->modify('+1 hour');

                    $dataModule[] = new Module($this->db->getElementColor($d->summary, $moduleList),$d->summary,$de,$desc[0],$d->location,$start,$end);
                }
            }
        }
        foreach($dataModule as $d){
            $s = $d->getDebut()->format('d-m-Y');
            $y = $d->getDebut()->format('H:i');
            if(sizeof($d->getGroupe()) == 1){
                if(!isset($filteredData[$s][$y])){
                    $filteredData[$s][$y] = [];
                }
                array_push($filteredData[$s][$y],$d);
            }else {
                $filteredData[$s][$y] = $d;
            }
        }
        return $filteredData;
    }

    public function getWeekStartEnd($currentYear, $weekNumber) {
        $today = new DateTime( 'today' );

        return (object) [
            'first_day' => clone $today->setISODate( $currentYear, $weekNumber, 1 ),
            'last_day'  => clone $today->setISODate( $currentYear, $weekNumber, 7 )
        ];
    }

    private function initializeFilteredArray() {
        $array = [];
        for($i = 0; $i < 7; $i++){
            $date = new DateTime($this->currentWeek->first_day->format('d-m-Y'));
            $date->modify('+'.$i.' day');
            $array[$date->format('d-m-Y')] =  [];
        }
        foreach ($array as $a){
            $a[] = [];
        }
        return $array;
    }
}