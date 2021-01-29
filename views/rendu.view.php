<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="/public/css/bulma.min.css">
    <link rel="stylesheet" href="/public/css/rendu.css">
    <link rel="stylesheet" href="/public/css/common/header.css">
    <link rel="stylesheet" href="/public/css/common/profilMenu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <title>Jabami - Rendu</title>
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
<?php if($rendu->getIdUser() === $_SESSION['SESSID']['id'] || $_SESSION['SESSID']['is_delegue'] === null){ ?>
<div id="modify-modal" class="modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Modifier</p>
      <button id="close-modal" class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
        <article class="message is-danger mb-4">
            <div class="message-body py-3" id="output"></div>
        </article>
        <form id="modifyForm">
            <input type="text" id="rendu-id" value="<?= $rendu->getId() ?>" hidden>
            <?php $renduOfGroupe = implode('-', explode(', ', $rendu->getGroupe())); ?>
            <input type="text" id="groupe-of-rendu" value="<?= $renduOfGroupe ?>" hidden>
            <div class="select is-fullwidth mb-4">
                <select id="select_module_rendu" <?= ($_SESSION['SESSID']['is_delegue'] === null) ? 'onChange="getGroupFromModule(this)"' : '' ?>>
                    <option value="0">Module concerné</option>
                    <?php foreach($userModule as $md): ?>
                        <option value="<?= $md ?>" <?= ($rendu->getModule() === $md) ? 'selected' : '' ?>><?= $md ?></option>
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
            <input type="date" class="input mb-4" id="select_date_rendu" value="<?= $rendu->getDate()->format('Y-m-d') ?>">
            <div class="is-flex is-flex-direction-row is-align-items-center">
                <input type="number" class="input" min="0" placeholder="Temps estimé" id="select_temps_rendu" value="<?= floatval(explode('h', $rendu->getTempsEstime())[0]) ?>">
                <span class="pl-2">heure(s)*</span>
            </div>
            <p class="mb-4 is-size-7">(* 30 minutes = 0.5, 1 heure = 1)</p>
            <textarea cols="30" rows="10" class="textarea" placeholder="Description" id="desc_add_rendu" style="resize: none;"><?= $rendu->getDescription() ?></textarea>
        </form>
    </section>
    <footer class="modal-card-foot">
      <button class="button is-success" id="modify-rendu-btn">Sauvegarder</button>
    </footer>
  </div>
</div>
<?php } ?>
<section class="section p-0">
        <div class="columns">
            <div class="column p-0">
                <header class="is-flex is-flex-direction-row is-justify-content-space-between is-align-items-center pb-0 mx-0">
                    <a href="/"><img src="/public/img/logo-blanc.svg" class="image-logo ml-4"></a>
                    <div id="mobile-menu-button" style="height: 35px; width: 35px;">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <nav>
                        <ul class="is-flex is-flex-direction-row is-align-items-center">
                            <li><a href="/dashboard/1/<?= $gr ?>"><img src="/public/img/calendar.svg"></a></li>
                            <?= ($_SESSION['SESSID']['is_delegue'] === null) ? '<li><a href="/statistiques/1/'. $gr .'"><img src="/public/img/bar-chart.svg"></a></li>' : '' ?>
                            <?= ($_SESSION['SESSID']['is_delegue'] === null || ($_SESSION['SESSID']['is_delegue'] === true && $_SESSION['SESSID']['have_perm'] === true)) ? '<li><a href="/permissions/'. $gr .'"><img src="/public/img/balance.svg"></a></li>' : '' ?>
                            <li title="Historique"><a href="/historique"><img src="/public/img/history.svg"></a></li>
                            <li id="open-profil-menu"><img src="/public/img/user.svg"></li>
                        </ul>
                    </nav>
                    <div id="mobile-menu">
                        <ul class="is-flex is-flex-direction-column is-align-items-center">
                            <li><a href="/dashboard/1/<?= $gr ?>"><img src="/public/img/calendar.svg"><span>Tableau de bord</span></a></li>
                            <?= ($_SESSION['SESSID']['is_delegue'] === null) ? '<li><a href="/statistiques/1/'. $gr .'"><img src="/public/img/bar-chart.svg"><span>Statistiques</span></a></li>' : '' ?>
                            <?= ($_SESSION['SESSID']['is_delegue'] === null || ($_SESSION['SESSID']['is_delegue'] === true && $_SESSION['SESSID']['have_perm'] === true)) ? '<li><a href="/permissions/'. $gr .'"><img src="/public/img/balance.svg"><span>Gestion des permissions</span></a></li>' : '' ?>
                            <li><a href="/profil"><img src="/public/img/user.svg"><span>Profil</span></a></li>
                            <li title="Historique"><a href="/historique"><img src="/public/img/history.svg">Historique</a></li>
                            <li class="mt-5"><a href="/logout"><img class="mr-4" src="/public/img/logout.svg">Se déconnecter</a></li>
                        </ul>
                    </div>
                </header>
            </div>
        </div>
</section>
<section class="section pb-2">
    <div class="columns">
        <div class="column">
            <div class="box is-flex is-justify-content-space-between is-align-items-center">
                <div id="modification-output">
                    <h1 class="title m-0">Module : <?= $rendu->getModule() ?></h1>
                    <p class="mt-3">Temps estimé pour le réaliser: <code><?=  $rendu->getTempsEstime() ?></code></p>
                    <p class="mb-3">A faire pour le <code><?= $rendu->getDate()->format('d-m-Y') ?></code></p>
                    <p>Description : <?= $rendu->getDescription() ?></p>
                </div>
                <?php if($rendu->getIdUser() === $_SESSION['SESSID']['id'] || $_SESSION['SESSID']['is_delegue'] === null){ ?>
                    <div class="is-flex is-justify-content-center is-align-items-center is-flex-direction-column">
                        <button id="open-modify-modal" class="button is-primary is-fullwidth m-2">Modifier</button>
                        <button class="button is-danger is-fullwidth m-2" onclick="supprimerRendu(<?= $rendu->getId() ?>)">Supprimer</button>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<section class="section py-0 pt-4">
    <div class="columns">
        <div class="column is-full-mobile is-3-tablet is-2-desktop is-2-widescreen is-2-fullhd">
            <div class="select is-fullwidth mb-4">
                <select id="select_filter">
                    <option value="0">Tous les étudiants</option>
                    <option value="1">Etudiant(s) ayant terminé</option>
                    <option value="2">Etudiant(s) n'ayant pas terminé</option>
                </select>
            </div>
        </div>
    </div>
</section>
<section class="section pt-2">
    <div class="columns">
        <div class="column">
            <div class="box">
                <div class="table-container">
                    <div id="filter_output">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="/public/js/rendu.js"></script>
</body>
</html>
