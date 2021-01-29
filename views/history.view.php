<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jabami - Historique</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="/public/css/bulma.min.css">
    <link rel="stylesheet" href="/public/css/history.css">
    <link rel="stylesheet" href="/public/css/common/header.css">
    <link rel="stylesheet" href="/public/css/common/profilMenu.css">
    <link rel="stylesheet" href="/public/css/common/notifications.css">
</head>
<body>
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
                        <li><a href="/dashboard/1/<?= $gr ?>" style="width: 28px; height: 28px;"><img src="/public/img/calendar.svg"></a></li>
                        <?= ($_SESSION['SESSID']['is_delegue'] === null) ? '<li><a href="/statistiques/1/'. $gr .'" style="width: 28px; height: 28px;"><img src="/public/img/bar-chart.svg"></a></li>' : '' ?>
                        <?= ($_SESSION['SESSID']['is_delegue'] === null || ($_SESSION['SESSID']['is_delegue'] === true && $_SESSION['SESSID']['have_perm'] === true)) ? '<li><a href="/permissions/'. $gr .'" style="width: 28px; height: 28px;"><img src="/public/img/balance.svg"></a></li>' : '' ?>
                        <li title="Liste des rendus"><a href="/historique"><img src="/public/img/history.svg"></a></li>
                        <li id="open-profil-menu"><img src="/public/img/user.svg"></li>
                    </ul>
                </nav>
                <div id="mobile-menu">
                    <ul class="is-flex is-flex-direction-column is-align-items-center">
                        <li><a href="/dashboard/1/<?= $gr ?>"><img src="/public/img/calendar.svg" style="width: 28px; height: 28px;"><span>Tableau de bord</span></a></li>
                        <?= ($_SESSION['SESSID']['is_delegue'] === null) ? '<li><a href="/statistiques/1/'. $gr .'" style="width: 28px; height: 28px;"><img src="/public/img/bar-chart.svg"><span>Statistiques</span></a></li>' : '' ?>
                        <?= ($_SESSION['SESSID']['is_delegue'] === null || ($_SESSION['SESSID']['is_delegue'] === true && $_SESSION['SESSID']['have_perm'] === true)) ? '<li><a href="/permissions/'. $gr .'" style="width: 28px; height: 28px;"><img src="/public/img/balance.svg"><span>Gestion des permissions</span></a></li>' : '' ?>
                        <li><a href="/historique"><img src="/public/img/history.svg"><span>Liste des rendus</span></a></li>
                        <li><a href="/profil"><img src="/public/img/user.svg"><span>Profil</span></a></li>
                        <li class="mt-5"><a href="/logout"><img class="mr-4" src="/public/img/logout.svg">Se déconnecter</a></li>
                    </ul>
                </div>
            </header>
        </div>
    </div>
</section>
<section class="section pb-0">
    <h1 class="title my-0">Votre liste des rendus</h1>
</section>
<section class="section is-flex is-justify-content-center is-align-items-center is-flex-direction-column">
<?php if($_SESSION['SESSID']['is_delegue'] !== null){ ?>
    <?php if(!empty($rendus)){ ?>
    <div class="box">
        <h5 class="title is-5">Liste de vos travaux</h5>
        <div class="table-container">
            <table class="table is-bordered is-striped is-hoverable">
                <thead>
                    <tr>
                        <th>Etat</th>
                        <th>Date</th>
                        <th>Temps</th>
                        <th>Module</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($isRenduFini as $rendu) {
                        $fini = array_search($rendu, $isRenduFini);
                        foreach ($rendu as $value):?>
                        <tr>
                        <td> <?= ($fini == 'true') ? '<button class="button is-danger" onclick="annulerRendu(this,'.$value[0]->getId().')" >Annuler</button>' : '<button class="button is-success" onclick="openTerminerModal(this,'. $value[0]->getId() .')" >Terminer</button>' ?></td>
                        <td class="has-text-centered"><?= sizeof($value) > 1 ? $value[1]->format("d-m-Y") : "/" ?></td>
                        <td><?= sizeof($value) > 1 ? $value[2].'h' : "/" ?></td>
                        <td><?= $value[0]->getModule() ?></td>
                        <td><?= $value[0]->getDescription()?></td>
                        </tr>
                        <?php endforeach;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php }else { ?>
        <div class="columns">
            <div class="column">
                <p class="is-full has-text-centered">Aucune données disponible</p>
            </div>
        </div>
    <?php } ?>
<?php }
if(!empty($renduOfEns)){ ?>
    <div class="box">
        <h5 class="title is-5">Liste des travaux que vous avez ajouté</h5>
        <div class="table-container">
            <table class="table is-bordered is-striped is-hoverable">
                <thead>
                <tr>
                    <th>Action</th>
                    <th>Module</th>
                    <th>Groupe concerné</th>
                    <th>Description</th>
                    <th>Date limite</th>
                    <th>Temps estimé</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($renduOfEns as $rendu): ?>
                    <tr>
                        <td> <button class="button is-danger" onclick="supprimerRendu(this, <?= $rendu->getId() ?>)">Supprimer</button> </td>
                        <td class="has-text-centered"><?= $rendu->getModule() ?></td>
                        <td><?= $rendu->getGroupe() ?></td>
                        <td><?= $rendu->getDescription() ?></td>
                        <td><?= $rendu->getDate()->format('d-m-Y') ?></td>
                        <td><?= $rendu->getTempsEstime()?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>
</section>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="/public/js/history.js"></script>
</body>
</html>
