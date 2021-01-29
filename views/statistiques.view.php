<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/bulma.min.css">
    <link rel="stylesheet" href="/public/css/stats.css">
    <link rel="stylesheet" href="/public/css/common/header.css">
    <link rel="stylesheet" href="/public/css/common/profilMenu.css">
    <!-- <link rel="stylesheet" href="../public/css/debug.css"> -->
    <title>Jabami - Statistiques</title>
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
                            <li><a href="/dashboard/<?= $week ?>/<?= $gr ?>" style="width: 28px; height: 28px;"><img src="/public/img/calendar.svg"></a></li>
                            <?= ($_SESSION['SESSID']['is_delegue'] === null) ? '<li><a href="/statistiques/'. $week .'/'. $gr .'" style="width: 28px; height: 28px;"><img src="/public/img/bar-chart.svg"></a></li>' : '' ?>
                            <?= ($_SESSION['SESSID']['is_delegue'] === null || ($_SESSION['SESSID']['is_delegue'] === true && $_SESSION['SESSID']['have_perm'] === true)) ? '<li><a href="/permissions/'. $gr .'" style="width: 28px; height: 28px;"><img src="/public/img/balance.svg"></a></li>' : '' ?>
                            <li title="Liste des rendus"><a href="/historique"><img src="/public/img/history.svg"></a></li>
                            <li id="open-profil-menu"><img src="/public/img/user.svg"></li>
                        </ul>
                    </nav>
                    <div id="mobile-menu">
                        <ul class="is-flex is-flex-direction-column is-align-items-center">
                            <li><a href="/dashboard/<?= $week ?>/<?= $gr ?>" style="width: 28px; height: 28px;"><img src="/public/img/calendar.svg"><span>Tableau de bord</span></a></li>
                            <?= ($_SESSION['SESSID']['is_delegue'] === null) ? '<li><a href="/statistiques/'. $week .'/'. $gr .'" style="width: 28px; height: 28px;"><img src="/public/img/bar-chart.svg"><span>Statistiques</span></a></li>' : '' ?>
                            <?= ($_SESSION['SESSID']['is_delegue'] === null || ($_SESSION['SESSID']['is_delegue'] === true && $_SESSION['SESSID']['have_perm'] === true)) ? '<li><a href="/permissions/'. $gr .'" style="width: 28px; height: 28px;"><img src="/public/img/balance.svg"><span>Gestion des permissions</span></a></li>' : '' ?>
                            <li><a href="/profil"><img src="/public/img/user.svg"><span>Profil</span></a></li>
                            <li><a href="/historique"><img src="/public/img/history.svg"><span>Liste des rendus</span></a></li>
                            <li class="mt-5"><a href="/logout"><img class="mr-4" src="/public/img/logout.svg">Se déconnecter</a></li>
                        </ul>
                    </div>
                </header>
            </div>
        </div>
</section>
    <div class="columns main-section px-5">
        <div class="column pt-0">
            <div class="content">
                <div class="columns mt-3">
                    <div class="column">
                        <div class="select is-rounded mr-5">
                            <select class="select-groupe">
                                <option value="0">Selectionner par groupe de TD</option>
                                <?php foreach($tdGroupe as $g): ?>
                                    <option value="<?= $g ?>" <?= ($gr == $g) ? "selected" : "" ?>><?= $g ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="select is-rounded">
                            <select class="select-groupe">
                                <option value="0">Selectionner par groupe de TP</option>
                                <?php foreach($tpGroupe as $g): ?>
                                    <option value="<?= $g ?>" <?= ($gr == $g) ? "selected" : "" ?>><?= $g ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <h1 class="title my-0">Statistiques générale</h1>
                <p>
                    <?= ($week > 1) ? '<a class="button my-3" href="/statistiques/'. ($week - 1).'/'. $gr .'"><i class="fas fa-chevron-left"></i></a>' : '' ?>
                    <a class="button my-3" href="/statistiques/1/<?= $gr ?>"><i class="fas fa-home"></i></a>
                    <a class="button my-3" href="/statistiques/<?= $week + 1 ?>/<?= $gr ?>"><i class="fas fa-chevron-right"></i></a>
                </p>
            </div>
            <div class="columns">
                <div class="column is-two-thirds-tablet is-two-thirds-desktop chart box m-2">
                    <div id="renduChart"></div>
                </div>
                <div class="column is-one-third-tablet is-one-third-desktop chart box m-2">
                    <div id="coursChart"></div>
                </div>
            </div>
            <div class="columns">
                <div class="column is-one-third-tablet is-one-third-desktop chart box m-2">
                    <div id="temps-estime-reel"></div>
                </div>
                <div class="column is-two-thirds-tablet is-two-thirds-desktop chart box m-2">
                    <div id="moyenneRendusCours"></div>
                </div>
            </div>
            <!-- eleve -->
            <div class="columns mt-3">
                <div class="column">
                    <h2 class="title mr-5">Statistiques individuelles</h2>
                    <div class="select is-rounded mr-5">
                        <select id="select-eleve">
                            <option value="0">Selectionner un élève</option>
                            <?php foreach($eleveList as $eleve): ?>
                                <option value="<?= $eleve->getUgaId() ?>" <?= (isset($eleveNom) && $eleveNom == $eleve->getUgaId()) ? "selected" : ""?> > <?= $eleve->getNom() .' '. $eleve->getPrenom() ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="columns">
                <?php
                    if(isset($eleveNom)){?>
                        <div class="column is-one-half-tablet is-one-half-desktop chart box m-2">
                            <div id="rapportRenduEffectues"></div>
                        </div>
                        <div class="column is-one-half-tablet is-one-half-desktop chart box m-2">
                            <div id="comparaisonRenduEffectues"></div>
                        </div>
                    <?php }else {
                        echo '<div id="noEleve">
                            <p>Aucun éleve sélectionné</p>
                        </div>';
                    }
                ?>
            </div>
        </div>
    </div>
<script src="/public/js/canvajs/canvasjs.min.js"></script>
<script>
    window.onload = function () {

    var renduChart = new CanvasJS.Chart("renduChart", {
        animationEnabled: true,
        theme: "light2",
        title:{
            text: "Total d'heure(s) de travail",
            fontSize: 20,
        },
        axisY:{
            includeZero: true
        },
        legend:{
            cursor: "pointer",
            verticalAlign: "top",
            horizontalAlign: "center",
            itemclick: toggleDataSeries
        },
        data: [{
            type: "column",
            name: "Travaux à faire (temps estimé)",
            color: "#363636",
            indexLabel: "{y}",
            yValueFormatString: "#0.#h",
            showInLegend: true,
            dataPoints: <?php echo json_encode($chargeTravailRendu, JSON_NUMERIC_CHECK); ?>
        },{
            type: "column",
            name: "Cours (temps ADE)",
            color: "#d44747",
            indexLabel: "{y}",
            yValueFormatString: "#0.#h",
            showInLegend: true,
            dataPoints: <?php echo json_encode($chargeTravailCours, JSON_NUMERIC_CHECK); ?>
        }]
    });

    var coursChart = new CanvasJS.Chart("coursChart", {
        animationEnabled: true,
        theme: "light2",
        title:{
            text: "Nombre d'heure(s) de travail par module sur la semaine",
            fontSize: 20,
        },
        axisY: {
            includeZero: true
        },
        data: [{
            type: "column",
            yValueFormatString: "#0.#h",
            dataPoints: <?php echo json_encode($dataCoursRendus); ?>
        }]
    });

    CanvasJS.addColorSet("redblack",["#363636","#d44747"]);

    var moyenneRendusCours = new CanvasJS.Chart("moyenneRendusCours", {
        animationEnabled: true,
        theme: "light2",
        colorSet:  "redblack",
        title:{
            text: "Moyenne de temps de travail par jour sur la semaine",
            fontSize: 20,
        },
        axisY: {
            includeZero: true
        },
        data: [{
            type: "pie",
            indexLabelPlacement: "inside",
            indexLabelFontColor: "#fff",
            yValueFormatString: "#0.#h",
            dataPoints: <?php echo json_encode($moyenne); ?>
        }]
    });

    var tempsEstimeReelChart = new CanvasJS.Chart("temps-estime-reel", {
        animationEnabled: true,
        theme: "light2",
        title:{
            text: "Moyenne temps estimé/réel des travaux à faire par module",
            fontSize: 20,
        },
        axisY:{
            includeZero: true
        },
        legend:{
            cursor: "pointer",
            verticalAlign: "top",
            horizontalAlign: "center",
            itemclick: toggleDataSeries
        },
        data: [{
            type: "column",
            name: "Travaux à faire (temps réel)",
            color: "#363636",
            indexLabel: "{y}",
            yValueFormatString: "#0.#h",
            showInLegend: true,
            dataPoints: <?php echo json_encode($tempsReelRendu, JSON_NUMERIC_CHECK); ?>
        },{
            type: "column",
            name: "Travaux à faire (temps estimé)",
            color: "#d44747",
            indexLabel: "{y}",
            yValueFormatString: "#0.#h",
            showInLegend: true,
            dataPoints: <?php echo json_encode($tempsEstimeRendu, JSON_NUMERIC_CHECK); ?>
        }]
    });

    var rapportRenduEffectuesChart = document.getElementById("rapportRenduEffectues");

    if(rapportRenduEffectuesChart){
        var rapportRenduEffectues = new CanvasJS.Chart("rapportRenduEffectues", {
            animationEnabled: true,
            theme: "light2",
            colorSet:  "redblack",
            title:{
                text: "Rapport du nombre de rendus effectués sur le nombre total de rendus",
                fontSize: 20,
            },
            axisY: {
                includeZero: true
            },
            data: [{
                type: "pie",
                indexLabelPlacement: "inside",
                indexLabelFontColor: "#fff",
                yValueFormatString: "#0.##",
                dataPoints: <?php if(isset($rapportRenduEffectues)){ echo json_encode($rapportRenduEffectues);}else{ echo json_encode([]); } ?>
            }]
        });
        rapportRenduEffectues.render();
    }

    var comparaisonRenduEffectuesChart = document.getElementById("comparaisonRenduEffectues");

    if(comparaisonRenduEffectuesChart){
        var comparaisonRenduEffectues = new CanvasJS.Chart("comparaisonRenduEffectues", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Comparaison de la moyenne du temps de rendus effectués par modules",
                fontSize: 20,
            },
            axisY:{
                includeZero: true
            },
            legend:{
                cursor: "pointer",
                verticalAlign: "top",
                horizontalAlign: "center",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "Travaux Fait (temps réel)",
                color: "#363636",
                indexLabel: "{y}",
                yValueFormatString: "#0.#h",
                showInLegend: true,
                dataPoints: <?php if(isset($comparaisonRenduEffectues)){ echo json_encode($comparaisonRenduEffectues[0], JSON_NUMERIC_CHECK); }else{ echo json_encode([], JSON_NUMERIC_CHECK); } ?>
            },{
                type: "column",
                name: "Travaux Fait (temps estimé)",
                color: "#d44747",
                indexLabel: "{y}",
                yValueFormatString: "#0.#h",
                showInLegend: true,
                dataPoints: <?php if(isset($comparaisonRenduEffectues)){ echo json_encode($comparaisonRenduEffectues[1], JSON_NUMERIC_CHECK); }else{ echo json_encode([], JSON_NUMERIC_CHECK); } ?>
            }]
        });
        comparaisonRenduEffectues.render();
    }

    renduChart.render();
    coursChart.render();
    moyenneRendusCours.render();
    tempsEstimeReelChart.render();

    function toggleDataSeries(e){
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        } else{
		    e.dataSeries.visible = true;
	    }
	    renduChart.render();
    }

}
    </script>
    <script src="/public/js/stats.js"></script>
    <script src="https://kit.fontawesome.com/ae7adf6d8c.js" crossorigin="anonymous"></script>
</body>
</html>
