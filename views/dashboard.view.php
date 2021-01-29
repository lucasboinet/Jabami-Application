<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="/public/css/bulma.min.css">
    <link rel="stylesheet" href="/public/css/dashboard.css">
    <link rel="stylesheet" href="/public/css/common/header.css">
    <link rel="stylesheet" href="/public/css/common/profilMenu.css">
    <link rel="stylesheet" href="/public/css/common/notifications.css">
    <title>Jabami - Dashboard</title>
</head>
<body <?= ($_SESSION['SESSID']['is_delegue'] !== null) ? 'onload="setRenduModalEventListener()"' : '' ?>>
<div id="profil">
    <h2><?= strtoupper($_SESSION['SESSID']['nom'][0] . $_SESSION['SESSID']['prenom'][0]) ?></h2>
    <p class="p-0 m-0"><?= ucfirst($_SESSION["SESSID"]["nom"]).' '.ucfirst($_SESSION["SESSID"]["prenom"]) ?></p>
    <p class="p-0 m-0">(<?= $_SESSION["SESSID"]["id"] ?>)</p>
    <p><?= $_SESSION['SESSID']['is_delegue'] === null ? 'Enseignant' : 'Etudiant' ?></p>
    <div class="separator mb-0"></div>
    <ul>
        <li><a href="/profil">Profil</a></li>
        <li><a href="/logout"><img src="/public/img/logout.svg"></a></li>
    </ul>
</div>
<?php if($_SESSION['SESSID']['is_delegue'] !== null){ ?>
<div id="notification-box">
    <div id="notification-header" class="is-flex is-justify-content-space-between">
        <h3>Notifications</h3>
        <?php
        if(sizeof($notifications) > 0){
            echo '<p id="dismiss-btn">Marquer comme lus</p>';
        }
        ?>
    </div>
    <div id="notification-content">
        <ul>
        <?php
            if(sizeof($notifications) > 0){
                foreach ($notifications as $notif) {
                    switch($notif->getType()){
                        case 'rendu':
                            echo '<li class="rendu_notif"><i class="fas fa-sticky-note"></i><p>' . $notif->getMessage().' <span> - Recu le '. $notif->getDateEnvoi()->format('d-m-Y') .' à '. $notif->getDateEnvoi()->format('H:i') .'</span></p></li>';
                            break;
                        case 'perm':
                            echo '<li class="perm_notif"><i class="fas fa-exclamation-triangle"></i><p>' . $notif->getMessage().' <span> - Recu le '. $notif->getDateEnvoi()->format('d-m-Y') .' à '. $notif->getDateEnvoi()->format('H:i') .'</span></p></li>';
                            break;
                        case 'rendu_date':
                            echo '<li class="rendu_date_notif"><i class="fas fa-exclamation-triangle"></i><p>' . $notif->getMessage().' <span> - Recu le '. $notif->getDateEnvoi()->format('d-m-Y') .' à '. $notif->getDateEnvoi()->format('H:i') .'</span></p></li>';
                            break;
                        case 'rendu_modif':
                            echo '<li class="rendu_modif_notif"><i class="fas fa-sticky-note"></i><p>' . $notif->getMessage().' <span> - Recu le '. $notif->getDateEnvoi()->format('d-m-Y') .' à '. $notif->getDateEnvoi()->format('H:i') .'</span></p></li>';
                            break;
                        default:
                        echo '<li class="rendu_date_dep_notif"><i class="fas fa-exclamation-triangle"></i><p>' . $notif->getMessage().' <span> - Recu le '. $notif->getDateEnvoi()->format('d-m-Y') .' à '. $notif->getDateEnvoi()->format('H:i') .'</span></p></li>';
                            break;
                    }
                }
            }else {
                echo '<p>Aucune notification(s)</p>';
            }
        ?>
        </ul>
    </div>
</div>
<div id="notification-button-container">
    <?php
        if(sizeof($notifications) > 0){
        echo '<div id="notification-number">'. sizeof($notifications) .'</div>';
        }
    ?>
    <div id="notification-button">
        <img src="/public/img/bell.svg">
    </div>
</div>
<?php } ?>
<div id="open-rendu-info-modal" class="modal">
  <div class="modal-background"></div>
  <div class="modal-content" id="modal-rendu-info-content">

  </div>
  <button class="modal-close is-large" aria-label="close"></button>
</div>

<div id="finir_rendu_modal" class="modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Temps de réalisation</p>
      <button class="delete" aria-label="close" id="close_finir_rendu"></button>
    </header>
    <section class="modal-card-body">
        <article class="message is-danger mb-4">
            <div class="message-body py-3" id="finir_output"></div>
        </article>
        <p class="mb-2">Indiqué le temps passé pour le terminer: </p>
        <form id="finir_form">
            <div class="is-flex is-flex-direction-row is-align-items-center">
                <input type="number" class="input" min="0" placeholder="Temps estimé" id="finir_temps_rendu">
                <span class="pl-2">heure(s)*</span>
            </div>
            <p class="mt-1 is-size-7">(* 30 minutes = 0.5, 1 heure = 1)</p>
            <input type="text"id="rendu_modal_id" hidden>
        </form>
    </section>
    <footer class="modal-card-foot">
      <button class="button is-success" id="confirm_finir">Confirmer</button>
    </footer>
  </div>
</div>
<div id="add-rendu-modal" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">Ajouter un travail à faire</p>
            <button class="delete close-rendu-modal" aria-label="close"></button>
        </header>
        <section class="modal-card-body">
            <article class="message is-danger mb-4">
                <div class="message-body py-3" id="output"></div>
            </article>
            <form id="addForm">
                <div class="select is-fullwidth mb-4">
                    <select id="select_module_rendu" <?= ($_SESSION['SESSID']['is_delegue'] === null) ? 'onChange="getGroupFromModule(this)"' : '' ?>>
                        <option value="0">Module concerné</option>
                        <?php foreach($userModule as $md): ?>
                            <option value="<?= $md ?>"><?= $md ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php
                if($_SESSION['SESSID']['is_delegue'] !== null){
                ?>
                <div class="multiselect is-fullwidth mb-4">
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
                        </label>
                        <?php foreach($tpGroupe as $g): ?>
                            <label>
                                <input class="groupeCheck" type="checkbox" value="<?= $g ?>">
                                <?= $g ?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php
                }
                ?>
                <div id="select_module_groupe_output">
                </div>
                <input type="date" class="input mb-4" id="select_date_rendu">
                <div class="is-flex is-flex-direction-row is-align-items-center">
                    <input type="number" class="input" min="0" placeholder="Temps estimé" id="select_temps_rendu">
                    <span class="pl-2">heure(s)*</span>
                </div>
                <p class="mb-4 is-size-7">(* 30 minutes = 0.5, 1 heure = 1)</p>
                <textarea cols="30" rows="10" class="textarea" placeholder="Description" id="desc_add_rendu" style="resize: none;"></textarea>
                <input type="text" id="prof_add_rendu" value="<?= $_SESSION['SESSID']['is_delegue'] === null ? 'true' : 'false' ?>" hidden>
                <input type="text" id="d1_add_rendu" value="<?= array_keys($data)[0] ?>" hidden>
                <input type="text" id="d2_add_rendu" value="<?= array_keys($data)[6] ?>" hidden>
            </form>
        </section>
        <footer class="modal-card-foot">
            <button class="button is-success" id="add_rendu">Ajouter</button>
            <button class="button close-rendu-modal">Annuler</button>
        </footer>
    </div>
</div>
<section class="section p-0">
    <div class="columns">
        <div class="column p-0">
            <header class="is-flex is-flex-direction-row is-justify-content-space-between is-align-items-center pb-0 mx-0">
                <a href="/"><img src="/public/img/logo-blanc.svg" class="image-logo ml-4 mt-2"></a>
                <div id="mobile-menu-button" style="height: 35px; width: 35px;">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <nav>
                    <ul class="is-flex is-flex-direction-row is-align-items-center">
                        <li><a href="/dashboard/<?= $week ?>/<?= $gr ?>" title="Tableau de bord"><img src="/public/img/calendar.svg"></a></li>
                        <?= ($_SESSION['SESSID']['is_delegue'] === null) ? '<li><a href="/statistiques/'. $week .'/'. $gr .'" title="Statistiques"><img src="/public/img/bar-chart.svg"></a></li>' : '' ?>
                        <?= ($_SESSION['SESSID']['is_delegue'] === null || ($_SESSION['SESSID']['is_delegue'] === true && $_SESSION['SESSID']['have_perm'] === true)) ? '<li><a href="/permissions/'. $gr .'" style="width: 28px; height: 28px;" title="Gestion des permissions"><img src="/public/img/balance.svg"></a></li>' : '' ?>
                        <?= $_SESSION['SESSID']['have_perm'] === true ? '<li class="open-rendu-modal" title="Ajouter un rendu"><a><img src="/public/img/document.svg"></a></li>' : '' ?>
                        <li title="Liste des rendus"><a href="/historique"><img src="/public/img/history.svg"></a></li>
                        <li id="open-profil-menu" title="Profil"><img src="/public/img/user.svg"></li>
                    </ul>
                </nav>
                <div id="mobile-menu">
                    <ul class="is-flex is-flex-direction-column is-align-items-center">
                        <li><a href="/dashboard/<?= $week ?>/<?= $gr ?>"><img src="/public/img/calendar.svg"><span>Tableau de bord</span></a></li>
                        <?= ($_SESSION['SESSID']['is_delegue'] === null) ? '<li><a href="/statistiques/'. $week .'/'. $gr .'"><img src="/public/img/bar-chart.svg"><span>Statistiques</span></a></li>' : '' ?>
                        <?= ($_SESSION['SESSID']['is_delegue'] === null || ($_SESSION['SESSID']['is_delegue'] === true && $_SESSION['SESSID']['have_perm'] === true)) ? '<li><a href="/permissions/'. $gr .'"><img src="/public/img/balance.svg"><span>Gestion des permissions</span></a></li>' : '' ?>
                        <?= $_SESSION['SESSID']['have_perm'] === true ? '<li class="open-rendu-modal"><a><img src="/public/img/document.svg"><span>Ajouter un rendu</span></a></li>' : '' ?>
                        <li><a href="/historique"><img src="/public/img/history.svg"><span>Liste des rendus</span></a></li>
                        <li><a href="/profil"><img src="/public/img/user.svg"><span>Profil</span></a></li>
                        <li class="mt-5"><a href="/logout"><img class="mr-4" src="/public/img/logout.svg">Se déconnecter</a></li>
                    </ul>
                </div>
            </header>
        </div>
    </div>
    <div class="columns main-section px-5">
        <div class="column pt-0">
            <div class="content">
                <div class="columns mt-3">
                    <div class="column">
                        <div class="groupeSel select is-rounded mr-5">
                            <select class="select-groupe">
                                <option value="0">Selectionner par groupe de TD</option>
                                <?php foreach($tdGroupe as $g): ?>
                                    <option value="<?= $g ?>" <?= ($gr == $g) ? "selected" : "" ?>><?= $g ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="groupeSel select is-rounded">
                            <select class="select-groupe">
                                <option value="0">Selectionner par groupe de TP</option>
                                <?php foreach($tpGroupe as $g): ?>
                                    <option value="<?= $g ?>" <?= ($gr == $g) ? "selected" : "" ?>><?= $g ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <h1 class="title my-0">Tableau de bord</h1>
                <?= (!$agenda->isJoignable()) ? '<span>(Liste des cours indisponible pour le moment)</span>' : '' ?>
                <p>
                    <?= ($week > 1) ? '<a class="button my-3" href="/dashboard/'. ($week - 1).'/'. $gr .'"><i class="fas fa-chevron-left"></i></a>' : '' ?>
                    <a class="button my-3" href="/dashboard/1/<?= $gr ?>"><i class="fas fa-home"></i></a>
                    <a class="button my-3" href="/dashboard/<?= $week + 1 ?>/<?= $gr ?>"><i class="fas fa-chevron-right"></i></a>
                </p>
            </div>
            <div class="columns is-multiline p-0">
                <?php
                $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
                if(!empty($data)){
                    $i = 0;
                    foreach($data as $day){
                        $current_day = array_keys($data)[$i];
                        $hasRendu = false;
                        $now = new DateTime('now');
                        $highlight = (strcmp($current_day, $now->format('d-m-Y')) === 0) ? '<div id="dayIndicator"></div>' : '';
                        $nbHeuresRendu = 0;
                        $nbHeuresCours = 0;
                        foreach ($rendus as $rendu) {
                            if ($rendu->getDate()->format('d-m-Y') == $current_day) {
                            $nbHeure = substr($rendu->getTempsEstime(), 0, -1);
                            $nbHeuresRendu = $nbHeuresRendu + $nbHeure;
                            }
                        }
                        if (!(empty($day))){
                            foreach ($day as $module) {
                            if (is_array($module)){
                                foreach ($module as $cours) {
                                if ($cours->getDebut()->format('d-m-Y') == $current_day){
                                    $nbHeuresCours = $nbHeuresCours + $cours->getDuration();
                                }
                                }
                            } else {
                                if ($module->getDebut()->format('d-m-Y') == $current_day){
                                $nbHeuresCours = $nbHeuresCours + $module->getDuration();
                                }
                            }
                            }
                        }
                        ?>
                        <div class="column box mt-0 mb-5 p-0 mx-2 day-row">
                            <h5 class="title is-5 has-text-centered m-0"><?= $jours[$i] ?></h5>
                            <p class="m-0 p-0 pb-2 is-full has-text-centered">(<?= $current_day ?>)</p>
                            <?= $highlight ?>
                            <div class="hoursIndicator">~<?= $nbHeuresRendu+$nbHeuresCours ?>h</div>
                            <div class="week-body">
                                <h6 class="title is-6">Rendus ~<?= $nbHeuresRendu ?>h</h6>
                                <div class="rendu-col content">
                                    <?php foreach($rendus as $rendu): ?>
                                        <?php if(strcmp($current_day, $rendu->getDate()->format('d-m-Y')) === 0){ ?>
                                            <?php $hasRendu = true; ?>
                                            <div class="rendu-item is-flex is-flex-direction-row" <?= ($_SESSION['SESSID']['is_delegue'] !== null) ? 'style="cursor: pointer;" onclick="seeMore('. $rendu->getId() .')"' : '' ?>>
                                                <?php if(($rendu->getIdUser() === $_SESSION['SESSID']['id'] && $_SESSION['SESSID']['is_delegue'] === null) || ($_SESSION['SESSID']['have_perm'] === true && $_SESSION['SESSID']['is_delegue'] !== null && $rendu->addedByUser())){ ?>
                                                    <div class="rendu-owned" title="Crée par moi, modifiable"></div>
                                                <?php } ?>
                                                <div class="rendu-color" style="background-color: <?= $rendu->getColor() ?>"></div>
                                                <div class="rendu-content">
                                                    <h6 class="title is-6 mb-1"><?= $rendu->getModule() ?></h6>
                                                    <p class="m-0"><?= $rendu->getGroupe() ?> ~<?= $rendu->getTempsEstime() ?></p>
                                                    <?php if($_SESSION['SESSID']['is_delegue'] !== null){
                                                        if($rendu->is_done){
                                                            echo '<span onclick="annuler_rendu(this,'. $rendu->getId() .')">Annuler</span><br>';
                                                        }else {
                                                            echo '<span onclick="openTerminerModal(event, this,'. $rendu->getId() .')">Terminer</span><br>';
                                                        }
                                                    }else {
                                                        if(in_array($rendu->getModule(), $userGroupeModule)){
                                                            echo '<a href="/dashboard/rendu/'. $gr .'/'. $rendu->getId() .'">Plus de détails</a>';
                                                        }
                                                    } ?>
                                                </div>
                                            </div>
                                        <?php }
                                        endforeach;
                                    if(!$hasRendu){
                                        echo '
                                        <div class="no-rendu">
                                            <i class="far fa-file-alt"></i>
                                            <p>Aucun rendu ce jour</p>
                                        </div>';
                                    }
                                    ?>
                                </div>
                                <div class="separator mb-4"></div>
                                <h6 class="title is-6">Cours ~<?= $nbHeuresCours ?>h</h6>
                                <div class="content">
                                    <?php
                                    if(!empty($day)){
                                        foreach($day as $module){?>
                                            <div class="columns">
                                                <?php if(is_array($module)){ ?>
                                                    <?php foreach($module as $m){ ?>
                                                        <div class="column">
                                                            <div class="cours-item is-flex is-flex-direction-row">
                                                                <div class="cours-color" style="background-color: <?= $m->getColor() ?>">
                                                                </div>
                                                                <div class="cours-content">
                                                                    <h6 class="title is-6 mb-1"><?= $m->getCode() ?></h6>
                                                                    <?php
                                                                        $coursGroupe = $m->getGroupe()[0];
                                                                        echo sizeof($m->getGroupe()) == 1 ? "<p class='m-0'>$coursGroupe</p>" : "";
                                                                    ?>
                                                                    <code><?= $m->getDebut()->format('H:i') ?>-<?= $m->getFin()->format('H:i') ?></code>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <div class="column">
                                                        <div class="cours-item is-flex is-flex-direction-row">
                                                            <div class="cours-color" style="background-color: <?= $module->getColor() ?>">
                                                            </div>
                                                            <div class="cours-content">
                                                                <h6 class="title is-6 mb-1"><?= $module->getCode() ?></h6>
                                                                <?php
                                                                $coursGroupe = $module->getGroupe()[0];
                                                                echo sizeof($module->getGroupe()) == 1 ? "<p>$coursGroupe</p>" : ""; ?>
                                                                <code><?= $module->getDebut()->format('H:i') ?>-<?= $module->getFin()->format('H:i') ?></code>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }?>
                                            </div>
                                        <?php }
                                    }else {
                                        echo '
                                            <div class="no-cours pb-6">
                                                <i class="far fa-folder-open"></i>
                                                <p>Aucun cours ce jour</p>
                                            </div>
                                        ';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                        $i++;
                    }
                }else {
                    echo '
                    <div class="column has-text-centered mt-6">
                        <h4 class="title is-4 has-text-grey">Aucun cours cette semaine !</h4>
                    </div>
                    ';
                }?>
            </div>
        </div>
    </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="/public/js/dashboard.js"></script>
    <script src="https://kit.fontawesome.com/ae7adf6d8c.js" crossorigin="anonymous"></script>
</body>
</html>
