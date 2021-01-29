<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/bulma.min.css">
    <link rel="stylesheet" href="/public/css/profil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- <link rel="stylesheet" href="../public/css/debug.css"> -->
    <link rel="stylesheet" href="/public/css/common/header.css">
    <link rel="stylesheet" href="/public/css/common/profilMenu.css">
    <link rel="stylesheet" href="/public/css/common/notifications.css">
    <title>Jabami - Profil</title>
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
                        <li><a href="/profil"><img src="/public/img/user.svg"><span>Profil</span></a></li>
                        <li title="Liste des rendus"><a href="/historique"><img src="/public/img/history.svg"><span>Liste des rendus</span></a></li>
                        <li class="mt-5"><a href="/logout"><img class="mr-4" src="/public/img/logout.svg">Se déconnecter</a></li>
                    </ul>
                </div>
            </header>
        </div>
    </div>
  </section>
  <section class="section is-flex is-justify-content-center is-align-items-center is-flex-direction-column">
    <div id="profilimage">
      <h2><?= strtoupper($_SESSION['SESSID']['nom'][0] . $_SESSION['SESSID']['prenom'][0]) ?></h2>
    </div>
    <h1 class="title is-3 pt-3"><?= ucfirst($_SESSION["SESSID"]["nom"]).' '.ucfirst($_SESSION["SESSID"]["prenom"]) ?></h1>
    <h2 class="subtitle is-4">(<?= $_SESSION["SESSID"]["id"] ?>)</h2>
    <div class="has-text-centered is-flex">
      <button class="button mb-5 mr-2" id="modalPass">Modifier son mot de passe</button>
      <?php if($_SESSION['SESSID']['is_delegue'] !== null){
        echo '<button class="button mb-5" id="modalHistBtn">Historique des notifications</button>';
      }
      ?>
    </div>
<?php if($_SESSION['SESSID']['is_delegue'] !== null){ ?>
  <div id="modalHist" class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Historique des notifications</p>
        <button class="delete" aria-label="close" id="close-notif-modal"></button>
      </header>
      <section class="modal-card-body">
        <table class="table is-bordered is-striped is-hoverable">
          <thead>
            <tr>
              <th>Message</th>
              <th>Date Envoi</th>
            </tr>
          </thead>
          <tbody>
            <?php
                foreach ($userNotif as $notif): ?>
                  <tr>
                    <td><?= $notif->getMessage() ?></td>
                    <td><?= $notif->getDateEnvoi()->format('d-m-Y H:i') ?></td>
                  </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </section>
    </div>
  </div>
  <?php } ?>
  <div id="password-modal" class="modal">
    <div id="PassBack" class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title">Modifier son mot de passe</p>
        <button id="password-close" class="delete" aria-label="close"></button>
      </header>
      <section class="modal-card-body">
          <article class="message is-danger mb-4">
              <div class="message-body py-3" id="output"></div>
          </article>
          <label for="ancienPass">Ancien mot de passe</label>
          <input class="input mb-4" type="password" id="ancien-pass">
          <label for="nouveauPass">Nouveau mot de passe</label>
          <input class="input mb-4" type="password" id="new-pass">
          <label for="confirmPass">Confirmer le nouveau mot de passe</label>
          <input class="input mb-4" type="password" id="confirm-pass">
      </section>
      <footer class="modal-card-foot">
        <button href="javascript:void(0)" onclick="changerPass()" class="button is-success">Valider</button>
      </footer>
    </div>
  </div>

    </section>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="/public/js/profil.js"></script>
  </body>
</html>
