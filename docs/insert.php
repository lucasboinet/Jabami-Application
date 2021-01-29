<?php
try {
    $db = new PDO('pgsql:host=postgresql-jabami.alwaysdata.net;dbname=jabami_app', 'jabami', 'jabami_dev6');
    echo "connected to pgsql\n";

    //insertion des groupes
      $db->query("insert into GROUPES(libelle) values ('INFO3B2')");
      $db->query("insert into GROUPES(libelle) values ('INFOS2dA1')");
      $db->query("insert into GROUPES(libelle) values ('INFO3B1')");
      $db->query("insert into GROUPES(libelle) values ('INFO3A1')");
      $db->query("insert into GROUPES(libelle) values ('INFO3A2')");
      $db->query("insert into GROUPES(libelle) values ('INFO3C1')");
      $db->query("insert into GROUPES(libelle) values ('INFO3C2')");
      $db->query("insert into GROUPES(libelle) values ('INFO3D1')");
      $db->query("insert into GROUPES(libelle) values ('INFO3D2')");
      $db->query("insert into GROUPES(libelle) values ('INFO1B2')");
      $db->query("insert into GROUPES(libelle) values ('INFO1B1')");
      $db->query("insert into GROUPES(libelle) values ('INFO1A1')");
      $db->query("insert into GROUPES(libelle) values ('INFO1A2')");
      $db->query("insert into GROUPES(libelle) values ('INFO1C1')");
      $db->query("insert into GROUPES(libelle) values ('INFO1C2')");
      $db->query("insert into GROUPES(libelle) values ('INFO1D1')");
      $db->query("insert into GROUPES(libelle) values ('INFO1D2')");

      $db->query("insert into GROUPES(libelle) values ('INFO2B2')");
      $db->query("insert into GROUPES(libelle) values ('INFO2B1')");
      $db->query("insert into GROUPES(libelle) values ('INFO2A1')");
      $db->query("insert into GROUPES(libelle) values ('INFO2A2')");
      $db->query("insert into GROUPES(libelle) values ('INFO2C1')");
      $db->query("insert into GROUPES(libelle) values ('INFO2C2')");
      $db->query("insert into GROUPES(libelle) values ('INFO2D1')");
      $db->query("insert into GROUPES(libelle) values ('INFO2D2')");

      $db->query("insert into GROUPES(libelle) values ('INFO4B2')");
      $db->query("insert into GROUPES(libelle) values ('INFO4B1')");
      $db->query("insert into GROUPES(libelle) values ('INFO4A1')");
      $db->query("insert into GROUPES(libelle) values ('INFO4A2')");
      $db->query("insert into GROUPES(libelle) values ('INFO4C1')");
      $db->query("insert into GROUPES(libelle) values ('INFO4C2')");
      $db->query("insert into GROUPES(libelle) values ('INFO4D1')");
      $db->query("insert into GROUPES(libelle) values ('INFO4D2')");

      $db->query("insert into GROUPES(libelle) values ('INFOS2dA2')");
      $db->query("insert into GROUPES(libelle) values ('INFOS3dA2')");
      $db->query("insert into GROUPES(libelle) values ('INFOS3dA1')");
      $db->query("insert into GROUPES(libelle) values ('INFOS4dA2')");
      $db->query("insert into GROUPES(libelle) values ('INFOS4dA1')");
      $db->query("insert into GROUPES(libelle) values ('INFOS1dA2')");
      $db->query("insert into GROUPES(libelle) values ('INFOS1dA1')");

      //insertion des modules
      $db->query("insert into MODULE(code, matiere, couleur) values ('M1103', 'Structures de données et algo. fondamentaux', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M1102', 'Intro. à  l''algo. et à  la programmation', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M1101A', 'Introduction aux systèmes informatiques', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M1101B', 'Introduction aux systèmes informatiques', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M1104', 'Fondements des bases de données', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M1105', 'Conception de documents et d’interfaces numériques', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M1106', 'Projet tutoré – Découverte', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M1201', 'Mathématiques discrètes', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M1202', 'Algèbre linéaire', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M1203', 'Environnement économique')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M1204', 'Fonctionnement des organisations', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M1205', 'Fondamentaux de la communication', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M1206', 'Anglais et informatique', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M1207', 'Connaître le monde professionnel', 'lightgrey')");

      $db->query("insert into MODULE(code, matiere, couleur) values ('M2101', 'Archi. et prog. des mécanismes de base d''un système info.', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M2102', 'Architecture des réseaux', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M2103', 'Bases de la programmation orientée objets', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M2104', 'Bases de la conception orientées objet', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M2105', 'Introduction aux IHM', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M2106', 'Programmation et administration des bases de données', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M2107', 'Projet tutoré – POO COO IHM', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M2201', 'Graphes et langages', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M2202', 'Analyse et méthodes numériques', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M2203A', 'Environnement comptable, financier, juridique et social (A)', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M2203B', 'Environnement comptable, financier, juridique et social (B)', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M2204', 'Gestion de projet informatique', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M2205', 'Communication, information et argumentation', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M2206', 'Communiquer en anglais', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M2207', 'Identifier ses compétences', 'lightgrey')");

      $db->query("insert into MODULE(code, matiere, couleur) values ('M3101', 'Principes des systèmes d''exploitation', '#f3a683')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M3102', 'Services réseaux', '#f7d794')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M3103', 'Algorithmique avancée', '#778beb')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M3104', 'Programmation web coté serveur', '#e77f67')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M3105', 'Conception et programmation objet avancées', '#cf6a87')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M3106C', 'Bases de données avancées', '#786fa6')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M3201', 'Probabilités et statistiques  ', '#f8a5c2')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M3202', 'Modélisations mathématiques', '#63cdda')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M3203', 'Droit des TIC', '#ea8685')");

      $db->query("insert into MODULE(code, matiere, couleur) values ('M3204', 'Gestion des systèmes d''information', '#596275')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M3205', 'Communication professionnelle', '#303952')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M3206', 'Anglais 3', '#55E6C1')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M3301', 'Méthodologie de la production d’applications', '#EAB543')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M3302', 'Semaine bloquée de C', '#B33771')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M3303', 'Préciser son projet', '#82589F')");

      $db->query("insert into MODULE(code, matiere, couleur) values ('M4101C1', 'Option Info1- Complexité algorithmique', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M4101C2', 'Option Info1 - Conception avancée', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M4101C3', 'Option Info1 - Administration système et réseau', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M4101C4', 'Option Info1- Architecture avancée', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M4101C5', 'Option Info1- Modélisation des Processus Métiers', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M4101C6', 'Option Info1 - Business Intelligence', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M4102C', 'Programmation répartie', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M4103C', 'Programmation web - client riche', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M4104C', 'Programmation mobile', 'lightgrey')");

      $db->query("insert into MODULE(code, matiere, couleur) values ('M4105C1', 'Option Info2 - Complément d''informatique', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M4105C2', 'Option Info2- IHM avancée', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M4105C3', 'Option Info2- Graphics', 'lightgrey')");

      $db->query("insert into MODULE(code, matiere, couleur) values ('M4105C4', 'Option Info2- Traitement d''images en C++', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M4105C5', 'Option Info2 - Programmation C# et ASP.NET', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M4106', 'Projets tutorés - Projet d''approfondissement', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M4201C1', 'Option EGO - Mathématiques financières', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M4201C2', 'Option EGO - Ateliers de création d''entreprise', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M4201C3', 'Option EGO - Management et économie', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M4202C1', 'Option Maths - Analyse avancée', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M4202C2', 'Option Maths - Linear Algebra', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M4202C3', 'Option Maths-Recherche opérationnelle et aide à la décision', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M4202C4', 'Option Maths - APP - Equations diffèrentielles', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M4203', 'Expression-communication', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M4204', 'Anglais 4', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('M4301', 'Stage', 'lightgrey')");
      $db->query("insert into MODULE(code, matiere, couleur) values ('MRESP', 'Module fictif pour jerome goulian', 'lightgrey')");
    // insertion des élèves

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('bolleg', '\$2y\$10\$DilUzB7.b/.Bg1F.wEG9vOciu1sSC3SkME0MCn01Y/Pcman5lyvEu', 'bolle', 'gwendal', 'gwendal.bolle@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3B2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('ghanoucb', '\$2y\$10\$LtdZBSt3E2c8PnHssVFRzuu/ATEQC3BP6h.f/LdcbvsCwduka7oiS', 'ghanouchi', 'brahim', 'brahim.ghanouchi@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3C1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('boinetl', '\$2y\$10\$XSuckpL4qr4jVK5ZijmglOZvWs7nZavmNl0eyo2D0TOxSgmC.53fy', 'boinet', 'lucas', 'lucas.boinet@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3B2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('robsont', '\$2y\$10\$sb96x1m/9yv2iyefXPciWeAJxrLnuwUgwvkiHeboXTCphpvbcveaC', 'robson', 'thomas', 'thomas.robson@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO3B2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('guillequ', '\$2y\$10\$VNP8nes9QYBnbkqZuuM8B.q83GfEavWwokmCzDe0/IpCG6tRoXGHO', 'guillet', 'quentin', 'quentin.guillet@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3C1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('hounyj', '\$2y\$10\$m02HYb2esksx0qTIrfYuV.24g/dyHAksSALCRAwXvnvx9fNtNTmme', 'houny', 'julien', 'julien.houny@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3B2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('maudruf', '\$2y\$10\$YT3p6MDm53pMKrEhkCgaV.nfsjseb.Hk5Z9evGVXULP2QmdRyim1e', 'maudru', 'felix', 'felix.maudru@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO3C2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('larabia', '\$2y\$10\$BMHxrxdfHdnaeQdkhUWUdOb/U4IzXciCd/wRYS.JuLv6hLztpiyR2', 'larabi', 'adam', 'adam.larabi@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3C2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('delabiea', '\$2y\$10\$dg6PnaQZ/P2cJUL2y8e3/.5LWL8dih836u5Av9NERhquh2wKxE4uS', 'delabie', 'antoine', 'antoine.delabie@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3B2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('rajag', '\$2y\$10\$HbqCGyznq1nZvMcf/H69heR5qEj7dApMzLL8iTKEXh.QYeYnFolKm', 'raja', 'gaspard', 'gaspard.raja@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3B2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('ahamedm', '\$2y\$10\$yLJpB1dlFPr4m591cODxL.DDuAxLGMZAzS9Ig1Ct1Y6tJkYfr3aPu', 'ahamed', 'moyad', 'moyad.ahamed@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3B2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('holu', '\$2y\$10\$9hftU.nx0t.JwD7IxPdFeeSNbd/Ng/oTzvmn246vKiQRqfbS86Nxi', 'ho', 'ludwig', 'ludwig.ho@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3C2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('guyotr', '\$2y\$10\$eEhvMbQYJnqw7xLyDP6c7.A12JkhNVhy1SZmPCaXaxio4AlOhQ8Oy', 'guyot', 'romain', 'romain.guyot@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3C2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('humblots', '\$2y\$10\$n/1L7Y5TS0ziWZYp3vvQTOYkdl5uIhlLLZ7tpaG7HoQLFzDTI.zD2', 'humblot', 'stephane', 'stephane.humblot@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3A2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pault', '\$2y\$10\$ZpXzE3X2uwW8zEOGRMyJlegmpVI827cv0RT/CR1pi55QNPzHlSyKa', 'paul', 'thomas', 'thomas.paul@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3A2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('thierryh', '\$2y\$10\$QfGWWQHYpgyX3CvwpwSK/OZVyuhHwHuXaOmFn4nBPmLkX2LsuE37W', 'thierry', 'hypolite', 'hypolite.thierry@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFOS2dA1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('martinc', '\$2y\$10\$WYqYlRTHVTe1Itm2AZFJnuURv8Y.8KbIMZQLB0Sl5/kkj3fwCOZ1u', 'martin', 'celia', 'celia.martin@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3A1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('forayn', '\$2y\$10\$NMfWDP0RmR9ux7QftI2RXOHLCbG0fwl.3VYLvaL3BTodpTF/jVkPm', 'foray', 'nicolas', 'nicolas.foray@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3D2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('jolym', '\$2y\$10\$Yg8.qpzDy7u0lp0L.VpL9.Y/1rTrzScAWQeA11bLNVuHI.S1nE7MK', 'joly', 'mathieu', 'mathieu.joly@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3D2')");

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('sospedra', '\$2y\$10\$WRaCuTwB/Vy6nue.DTPoNOLkETzcHYHDj1zpETqhhAEpKtkaUoLd.', 'sospedra', 'anne', 'anne.sospedra@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO3B1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('moreaul', '\$2y\$10\$U3Ls1QmHEAWjb52RaX5TMeBR5hDdvXmMgtxUF0kajxDMouZ9TgdKG', 'moreau', 'lucas', 'lucas.moreau@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3B1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('corbalac', '\$2y\$10\$MfIeer6IzHQn2EENkI2kwuLZcWUiaDXEoZlU5Na3vGo1.njinAXDK', 'corbalan', 'clement', 'clement.corbalan@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3B1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('thibaulm', '\$2y\$10\$x9vbhjLEK51tSyAcQpbuFOtIoc4gO0b2M2E9.YKjuYSQ3qZwICPA2', 'thibault', 'mathilde', 'mathilde.thibault@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3B2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('carminav', '\$2y\$10\$rGacASMXanPTDi0WjR1yH.8x1Y1YBpKoHOWPNJKkX7cDvWR80G0YG', 'carminati', 'vincenzo', 'vincenzo.carminati@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3B1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('loreauxe', '\$2y\$10\$cgA./pTNAEYry2Q4NFXl8uWFNLeBAYKQVYkQxK0X4CXuN61XXAtC.', 'loreaux', 'elian', 'elian.loreaux@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3B1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('grosf', '\$2y\$10\$Dn42CwbBtECIyaELPaT/veW7L43syAG41G.1UgTX68zOSXK5fnx/q', 'gros', 'flavien', 'flavien.gros@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3D1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('artalleg', '\$2y\$10\$FXYW6lNceL6SgZgr8vUkKegfvuZHhvJ0ZvZWVsdu8z7Z1OL7/IF8e', 'artalle', 'gwendal', 'gwendal.artalle@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3D1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('raciner', '\$2y\$10\$PxmISz5iSIuMOwLV6MuTYOZCS0dgHBO0RiD8NyouKPY9nU04obD9a', 'racine', 'romeo', 'romeo.racine@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3C1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('grosa', '\$2y\$10\$BKnsEbh3BfbiMLQ5XP5TxODhrMEwDNVjX.LirZJdT5lKcVxaYap8G', 'gros', 'antoine', 'antoine.gros@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3C1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('baptista', '\$2y\$10\$lfFs7Wbtz1koNfji0EXBR.agyakOwNdPaLACCzf0Knel/SME6/5A6', 'baptista', 'alain', 'alain.baptista@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO3C1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('bouhineh', '\$2y\$10\$2kHuoPSqJFPIRXjcky1zv.iOuBgK/do25ffvmpgiEa5v5GVoB.q9S', 'bouhineau-chevigny', 'hugolin', 'hugolin.bouhineau-chevigny@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3D1')");

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('jhistart', '\$2y\$10\$adR98QDRg93/MsqxUWqFResygKJWSZ7pN6qg3NBMwpoJ4EAHn7Nlm', 'jhistarry', 'thomas', 'thomas.jhistarry@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO3D2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('vergezv', '\$2y\$10\$fB3B/dpdxaIz6q8fxFwmO.HsCS8YmQWVqYm3qVZjRkc6FwC1WiOim', 'vergez', 'vincent', 'vincent.vergez@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3C2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('kadiris', '\$2y\$10\$OX68MlAXj4Nm/ESc1GNMZuOJv2ZZBRsZyuI5lFphDbWEUFpGEbVSy', 'kadiri', 'saad', 'saad.kadiri@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3A1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('roziert', '\$2y\$10\$L5feHui/szmg6kfy8F6f6uz6SQyB1NzRJHMXePKeRePcQ2TtM5fn.', 'rozier', 'theo', 'theo.rozier@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3A2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('gentild', '\$2y\$10\$BZQ.VSyRxZaGLW4RGNqjWuJhdi.XBPeNe7v5Ky0vmT/N1doHiA85O', 'gentil', 'driss', 'driss.gentil@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3A2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('portee', '\$2y\$10\$X.C88BP4oJdLfEAH0VRbbuF9x79QlPrD6thlG1YmOn/QfTfbV7qpa', 'porte', 'eden', 'eden.porte@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3C1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('ntaratam', '\$2y\$10\$rQYS76vsTaPWWrLCo.wk6.KUEcNCOnt3ZRo0ZdhNysdqrpndGEMS.', 'ntarataze', 'mac-vay', 'mac-vay.ntarataze@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3A2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('daikhn', '\$2y\$10\$zrgmcZTfS0Lf8/yaGBDuUutn7JNaRmx3RXPYM0Vpc4OdQhVaU9caC', 'daikh', 'nassim', 'nassim.daikh@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO3A1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('costesp', '\$2y\$10\$PxlQdhYw.SfQDBjhtwJXR.F4aaoMNRqufgnqxA5D8v.Am539BGlhy', 'costes-pinget', 'pierre-loup', 'pierre-loup.costes-pinget@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO3A2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('hacquarg', '\$2y\$10\$FEOQq7fGnjQioSOwvmfHg.8.ajaRu65wUu7GbQc9I2T8z8XLmp61S', 'hacquard', 'gregorie', 'gregorie.hacquard@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO3D1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('iqbalw', '\$2y\$10\$Y.uY74MoTOwAJSMdhp6MXexUexh8Dl7TTVvLE.sBw3VcjYQFg.Vom', 'iqbal', 'walid', 'walid.iqbal@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3C2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('escatg', '\$2y\$10\$m87wg0IdgIoDbLZwrFR5SOzv1WCqsMNAybu.RJW2aphTx34/KINNS', 'escat', 'gregory', 'gregory.escat@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3D2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('demirm', '\$2y\$10\$s8Ll9myKGeqPjitcEsdtDeva8kPjpV1wwahWA0OitKsNLUm9JBA8G', 'demir', 'mustafa', 'mustafa.demir@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3D1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('fragnona', '\$2y\$10\$Q3SJtV8GhojWe4IVhmFoMuyu7FB3FSkexr2HkwkPRiWzLLQRjv5i.', 'fragnon', 'adrien', 'adrien.fragnon@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3C2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('deronzit', '\$2y\$10\$sTj1ENk9M7iiRXcjvrbOvuz1nIYAMipYw41uLV..RWnL7mY5wdzzm', 'deronzier', 'titouan', 'titouan.deronzier@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3C2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('larguiel', '\$2y\$10\$hqiYz2G4.5js67I0Qo/JjuozSrYYBHYcSGM6lDBh.ffR.6sbXzwG.', 'larguier', 'luka', 'luka.larguier@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3C1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('chaizej', '\$2y\$10\$u023VqkCInYj5dC5RBBMluEEgmRtdM8x69atwMy9Fg/5YkpmY/hxi', 'chaize', 'jeremy', 'jeremy.chaize@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3D2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('lacoutul', '\$2y\$10\$O9W65Xv/ikKq.RDJy/Y0F.r7TlizXO8c0vHjsoDsJ5jMpK/cNltzS', 'lacouture', 'lucas', 'lucas.lacouture@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3D2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('marazk', '\$2y\$10\$NQl2pF0bQ8tkY3R5R9JXK.vyIjNMAF51bZVQU2yDlHuuKipqezevW', 'maraz', 'kaan', 'kaan.maraz@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3D1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('nezanl', '\$2y\$10\$NCfHlkH0YHuDG/MN8zWu9uK5A3KmOoeaHjDSBiMefbsWRzrrIPDw6', 'nezan', 'loris', 'loris.nezan@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3D1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('florem', '\$2y\$10\$90oFQJeAPAbB/240dfVXQOdZstM3wh2xFkVzuqF.LsZsFBgjRXHf.', 'flore', 'mae', 'mae.flore@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3C1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('maillerc', '\$2y\$10\$DfJnLe8lrermwoyf9ctJzOQPoQ97JC0ojKszJoLcP9ux9gdzluGce', 'mailler', 'corentin', 'corentin.mailler@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3C2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('signoret', '\$2y\$10\$yYqgQwwfrGZsRQvuvSL7o.oO7LxD/0SumD4Rv1m02x6ZH.pdrxX4K', 'signoret', 'tanguy', 'tanguy.signoret@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3D2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('remye', '\$2y\$10\$.v9uX.gJRs54CngWYrOgLujobBjxMzW4aLJ5Tab34JFIOPrNAuBmK', 'remy', 'emeryck', 'emeryck.remy@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3D2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pappalam', '\$2y\$10\$kFqiskCj.4cluTrI7.aqaO3cnbQ69C8RWafAgoBnEZbyec4Go1ct2', 'pappalardo', 'matteo', 'matteo.pappalardo@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3D2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('cartierl', '\$2y\$10\$ZhwvFnCYyCSe4lIQMsqmweDT0KSbV8/fZpw7OnaVsl/vl2ICEK9Ry', 'cartier-millon', 'laura', 'laura.cartier-millon@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3D1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('richallp', '\$2y\$10\$JkT3io/9d0bG/fgZxAdpzOBemV/dUTu2.EdrMQ.YtMdN22HEIIaXu', 'richalland', 'paul', 'paul.richalland@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3D1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('berruyew', '\$2y\$10\$suYhdUktZJCUFUI81BZhdeDY1sH5WiPtCJ7DC04FVZQiZYgGjHAsG', 'berruyer', 'william', 'william.berruyer@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3C1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('gelbj', '\$2y\$10\$XUwOY7Z5qLfkfNRKDe8qZONsOslnnLIcUE2GyeicEs8TqATrigXEG', 'gelb', 'jordy', 'jordy.gelb@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3B2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('fontanat', '\$2y\$10\$NsQGSi0b9POABkorDDuXcehIwqdiYibi5nGlskzuU0bDMx6IWh.PK', 'fontana', 'theo', 'theo.fontana@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3B1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('bossyr', '\$2y\$10\$Z3oRUplirRt2IGj/rnpCDezlNKPrNwdCKzGfu3cx8Flht2J02Ty/.', 'bossy', 'romain', 'romain.bossy@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3B1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('legendal', '\$2y\$10\$uwpP9VA99x89VDYpUoL4vum9/Lf5ucx2k.68bfHY8OMO196ytqINO', 'legendre', 'alexandre', 'alexandre.legendre@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3B1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('genestit', '\$2y\$10\$puEyCmotQKjL5hcaXMmRGO8d1bKCbFgQ953wSlnuGwUinohf4J0u2', 'genestier', 'thibault', 'thibault.genestier@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3B1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('mariottp', '\$2y\$10\$iNAyec/3.0kF0TDjwsQxGuycLQpZXeANghHy974AaM8IKvhTqU.xO', 'mariotti', 'paul', 'paul.mariotti@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3A2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('bouaricz', '\$2y\$10\$UdOP1st3pYL3HVnig5IIu.SVEm5TW7Y28flWnaSVvnd8kB3tILTuC', 'bouariche', 'zinedine', 'zinedine.bouariche@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3A2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('viaudn', '\$2y\$10\$SuzYJYUfHORSWVqnm8iMHu2pllAspPS3IdHKVeZJAUblRl2QieoPi', 'viaud', 'nathan', 'nathan.viaud@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3A1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('martignj', '\$2y\$10\$0tv0KVT0gy6lXq/yB5UxLOKcRMuQs0u0G9WOnuRvZR3GjzHP.RCp6', 'martigny', 'julien', 'julien.martigny@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3A2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('cerenc', '\$2y\$10\$WcbPAxGVChUlWKj52ElVoeC3ZLhsT1JXtNNsJxk8wjan2JkRxfJiS', 'ceren selva', 'carlos', 'carlos.ceren-selva@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3A1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('clercl', '\$2y\$10\$zlQamItZEpev7BEujmP11OGNZe1bRwtUfPMAAN7LEc6ayrsH.1owS', 'clerc', 'louis', 'louis.clerc@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3A1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('faillam', '\$2y\$10\$DvN9ZpduzCHcZn12nG.9nuu/TYlcKAklxJDapcYzd8gsqOTQeZGzm', 'failla', 'maxime', 'maxime.failla@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3A1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('guitonc', '\$2y\$10\$eermj5d202LFQbzaK0TJ.u/xNPOunyzanNFFEktosU8fAQWqizcaC', 'guiton', 'clement', 'clement.guiton@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3A1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('duplesst', '\$2y\$10\$gOwSlFmkAgM8l0fpHhaDK.V34Wz7p1vQJAmp1oDB2pIq205/ZTKA.', 'duplessis', 'thomas', 'thomas.duplessis@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO3A1')");

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('testS1A1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO1A1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('destS1A1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO1A1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS1A1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO1A1')");

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('testS1A2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO1A2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('destS1A2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO1A2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS1A2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO1A2')");

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('testS1B1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO1B1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('destS1B1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO1B1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS1B1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO1B1')");

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('testS1B2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO1B2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('destS1B2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO1B2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS1B2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO1B2')");

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('testS1C1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO1C1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('destS1C1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO1C1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS1C1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO1C1')");

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('testS1C2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO1C2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('destS1C2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO1C2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS1C2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO1C2')");

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('testS1D1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO1D1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('destS1D1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO1D1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS1D1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO1D1')");

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('testS1D2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO1D2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('destS1D2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO1D2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS1D2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO1D2')");
      //-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('testS2A1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO2A1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('destS2A1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO2A1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS2A1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO2A1')");

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('testS2A2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO2A2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('destS2A2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO2A2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS2A2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO2A2')");

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('testS2B1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO2B1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('destS2B1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO2B1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS2B1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO2B1')");

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('testS2B2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO2B2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('destS2B2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO2B2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS2B2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO2B2')");

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('testS2C1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO2C1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('destS2C1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO2C1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS2C1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO2C1')");

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('testS2C2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO2C2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('destS2C2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO2C2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS2C2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO2C2')");

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('testS2D1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO2D1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('destS2D1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO2D1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS2D1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO2D1')");

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('testS2D2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO2D2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('destS2D2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO2D2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS2D2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO2D2')");

      //-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('testS4A1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO4A1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('destS4A1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO4A1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS4A1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO4A1')");

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('testS4A2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO4A2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('destS4A2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO4A2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS4A2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO4A2')");

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('testS4B1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO4B1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('destS4B1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO4B1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS4B1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO4B1')");

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('testS4B2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO4B2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('destS4B2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO4B2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS4B2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO4B2')");

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('testS4C1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO4C1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('destS4C1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO4C1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS4C1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO4C1')");

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('testS4C2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO4C2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('destS4C2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO4C2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS4C2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO4C2')");

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('testS4D1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO4D1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('destS4D1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO4D1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS4D1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO4D1')");

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('testS4D2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFO4D2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('destS4D2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFO4D2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS4D2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO4D2')");

      //-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('test4DA1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFOS4dA1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('dest4DA1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFOS4dA1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pest4DA1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFOS4dA1')");

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('test4DA2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFOS4dA2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('dest4DA2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFOS4dA2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pest4DA2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFOS4dA2')");

      //-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('test1DA1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFOS1dA1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('dest1DA1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFOS1dA1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pest1DA1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFOS1dA1')");

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('test1DA2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFOS1dA2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('dest1DA2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFOS1dA2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pest1DA2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFOS1dA2')");

      //-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('test2DA1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFOS2dA1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('dest2DA1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFOS2dA1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pest2DA1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFOS2dA1')");

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('test2DA2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFOS2dA2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('dest2DA2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFOS2dA2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pest2DA2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFOS2dA2')");

      //-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('test3DA1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFOS3dA1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('dest3DA1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFOS3dA1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pest3DA1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFOS3dA1')");

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('test3DA2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, FALSE, 'INFOS3dA2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('dest3DA2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', TRUE, TRUE, 'INFOS3dA2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pest3DA2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFOS3dA2')");

      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS3A1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO3A1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS3A2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO3A2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS3B1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO3B1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS3B2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO3B2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS3C1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO3C1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS3C2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO3C2')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS3D1', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO3D1')");
      $db->query("insert into ELEVE(uga_id, pass, nom, prenom, mail, delegue, permissions, groupe) values('pestS3D2', '\$2y\$10\$ThyMFVdjPqqf7XY7gx6CeuohB6Da.KDdx14rpUSmeOukwwcQoHfjG', 'test', 'test', 'test.test@etu.univ-grenoble-alpes.fr', FALSE, TRUE, 'INFO3D2')");

      // insertion des enseignants

      $db->query("insert into ENSEIGNANT(uga_id, pass, nom, prenom, mail) values('blanchoh', '\$2y\$10\$mbQ/arYeL51kBKE4.cmrFeVgCltk8MF7lceGR1F5aRT/rhYLWfuhi', 'blanchon', 'herve', 'herve.blanchon@iut2.univ-grenoble-alpes.fr')");
      $db->query("insert into ENSEIGNANT(uga_id, pass, nom, prenom, mail) values('brunetf', '\$2y\$10\$wi9MQIGUAvtD7pDWsA4bVuqUWLOe9388V8tcYlb1aAptGor4Oncxm', 'brunet-manquat', 'francis', 'francis.brunet-manquat@iut2.univ-grenoble-alpes.fr')");
      $db->query("insert into ENSEIGNANT(uga_id, pass, nom, prenom, mail) values('blancog', '\$2y\$10\$ZxI.2UesgNlAN15XLCNVc.eb4CLl18f0HU8Uv3Ln/3rAZJLSTjOg.', 'blanco-laine', 'gaelle', 'gaelle.blanco-laine@iut2.univ-grenoble-alpes.fr')");
      $db->query("insert into ENSEIGNANT(uga_id, pass, nom, prenom, mail) values('dupuys', '\$2y\$10\$fzGvc.G9B/XBk23oTJSut.uxKK7ds/iqmi/Vz50f0rcJbMWu4AIlq', 'dupuy-chessa', 'sophie', 'sophie.dupuy-chessa@iut2.univ-grenoble-alpes.fr')");
      $db->query("insert into ENSEIGNANT(uga_id, pass, nom, prenom, mail) values('goulianj', '\$2y\$10\$cRYys9xPBVIj8TACX669.eaANiquhdSy03LEoH46JfsYxaj2P9Ere', 'goulian', 'jerome', 'jerome.goulian@iut2.univ-grenoble-alpes.fr')");
      $db->query("insert into ENSEIGNANT(uga_id, pass, nom, prenom, mail) values('karouia', '\$2y\$10\$8/bx6M42lZAal/ne7.VaM.ahHqEreleGpA54pm6qtWS7pxdwExSnu', 'karoui', 'aous', 'aous.karoui@iut2.univ-grenoble-alpes.fr')");
      $db->query("insert into ENSEIGNANT(uga_id, pass, nom, prenom, mail) values('giuffrit', '\$2y\$10\$noWAiI4BCf.d6dkLrn7teeK..4NEImaeU9erV9o6b98IapA6Sq0dy', 'giuffrida', 'tanguy', 'tanguy.giuffrida@iut2.univ-grenoble-alpes.fr')");
      $db->query("insert into ENSEIGNANT(uga_id, pass, nom, prenom, mail) values('bleuser', '\$2y\$10\$kbMIzcJoHQe/hht6pMGi3OLkxNGuuSQLQ5avSD2rCtAXvJCPuKc.O', 'bleuse', 'raphael', 'raphael.bleuse@iut2.univ-grenoble-alpes.fr')");
      $db->query("insert into ENSEIGNANT(uga_id, pass, nom, prenom, mail) values('lejeunea', '\$2y\$10\$8vwt1C0k.k4zDgEal/yzxe7cY5mcU0wnW4IuAj1y2oFTBY3fsnb7.', 'lejeune', 'anne', 'anne.lejeune@iut2.univ-grenoble-alpes.fr')");
      $db->query("insert into ENSEIGNANT(uga_id, pass, nom, prenom, mail) values('martinp', '\$2y\$10\$pbsbtYwcYo8e8JBEjuALheMJs04BRbQ93tnC1IyX0ImrBr/r9YtuG', 'martin', 'philipe', 'philipe.martin@iut2.univ-grenoble-alpes.fr')");
      $db->query("insert into ENSEIGNANT(uga_id, pass, nom, prenom, mail) values('gerotc', '\$2y\$10\$RdzVsoHFmDwnaLE5oP14MeJGoZRm0UNV0giPVqvMDDjBAu20FqRga', 'gerot', 'cedric', 'cedric.gerot@iut2.univ-grenoble-alpes.fr')");

      //$db->query("");

      // insertion des rendus
      $db->query("insert into RENDU(module, description, date_limite, id_enseignant, temps_estime) values('M1103', 'faire le tp', '2020-11-19', 'blanchoh', '1h')");
      $db->query("insert into RENDU(module, description, date_limite, id_enseignant, temps_estime) values('M1102', 'faire le tp 4', '2020-12-01', 'lejeunea', '1h')");
      $db->query("insert into RENDU(module, description, date_limite, id_enseignant, temps_estime) values('M1101A', 'faire le tp 2', '2020-11-23', 'giuffrit', '1h')");
      $db->query("insert into RENDU(module, description, date_limite, id_enseignant, temps_estime) values('M1104', 'finir le tp Tourmentin', '2020-11-20', 'dupuys', '1h')");
      $db->query("insert into RENDU(module, description, date_limite, id_enseignant, temps_estime) values('M1201', 'faire l''exercice 2 de la fiche donnée lundi', '2020-11-25', 'gerotc', '1h')");
      $db->query("insert into RENDU(module, description, date_limite, id_enseignant, temps_estime) values('M1202', 'finir la fiche', '2020-11-26', 'gerotc', '1h')");
      $db->query("insert into RENDU(module, description, date_limite, id_enseignant, temps_estime) values('M1101B', 'faire le tp 4', '2020-12-03', 'karouia', '1h')");

      $db->query("insert into RENDU(module, description, date_limite, id_enseignant, temps_estime) values ('M3102', 'finir le TP7', '2020-11-13', 'blanchoh', '1h')");
      $db->query("insert into RENDU(module, description, date_limite, id_enseignant, temps_estime) values ('M3102', 'finir le TP7', '2020-11-13', 'blanchoh', '1h')");
      $db->query("insert into RENDU(module, description, date_limite, id_enseignant, temps_estime) values ('M1102', 'finir le TP5', '2020-11-13', 'blanchoh', '1h')");
      $db->query("insert into RENDU(module, description, date_limite, id_enseignant, temps_estime) values ('M1102', 'finir le TP5', '2020-11-13', 'blanchoh', '1h')");
      $db->query("insert into RENDU(module, description, date_limite, id_enseignant, temps_estime) values ('M3203', 'faire le QCM', '2020-11-26', 'blancog', '1h')");
      $db->query("insert into RENDU(module, description, date_limite, id_enseignant, temps_estime) values ('M3203', 'faire le QCM', '2020-11-26', 'blancog', '1h')");
      $db->query("insert into RENDU(module, description, date_limite, id_enseignant, temps_estime) values ('M3203', 'faire le QCM', '2020-11-26', 'blancog', '1h')");
      $db->query("insert into RENDU(module, description, date_limite, id_enseignant, temps_estime) values ('M3203', 'faire le QCM', '2020-11-26', 'blancog', '1h')");
      $db->query("insert into RENDU(module, description, date_limite, id_enseignant, temps_estime) values ('M3203', 'faire le QCM', '2020-11-26', 'blancog', '1h')");
      $db->query("insert into RENDU(module, description, date_limite, id_enseignant, temps_estime) values ('M3203', 'faire le QCM', '2020-11-26', 'blancog', '1h')");
      $db->query("insert into RENDU(module, description, date_limite, id_enseignant, temps_estime) values ('M3203', 'faire le QCM', '2020-11-26', 'blancog', '1h')");
      $db->query("insert into RENDU(module, description, date_limite, id_enseignant, temps_estime) values ('M3203', 'faire le QCM', '2020-11-26', 'blancog', '1h')");

      // insertion des rendus groupe

      $db->query("insert into RENDU_GROUPE(libelle, num_rendu) values ('INFO3B2', 1)");
      $db->query("insert into RENDU_GROUPE(libelle, num_rendu) values ('INFO3B2', 1)");
      $db->query("insert into RENDU_GROUPE(libelle, num_rendu) values ('INFO3B2', 3)");
      $db->query("insert into RENDU_GROUPE(libelle, num_rendu) values ('INFO3B2', 4)");
      $db->query("insert into RENDU_GROUPE(libelle, num_rendu) values ('INFO3B2', 5)");
      $db->query("insert into RENDU_GROUPE(libelle, num_rendu) values ('INFO3B2', 6)");
      $db->query("insert into RENDU_GROUPE(libelle, num_rendu) values ('INFO3B2', 8)");
      $db->query("insert into RENDU_GROUPE(libelle, num_rendu) values ('INFO3B2', 9)");
      $db->query("insert into RENDU_GROUPE(libelle, num_rendu) values ('INFO3B1', 1)");
      $db->query("insert into RENDU_GROUPE(libelle, num_rendu) values ('INFO3B1', 3)");
      $db->query("insert into RENDU_GROUPE(libelle, num_rendu) values ('INFO3B1', 4)");
      $db->query("insert into RENDU_GROUPE(libelle, num_rendu) values ('INFO3B1', 5)");
      $db->query("insert into RENDU_GROUPE(libelle, num_rendu) values ('INFO3B1', 6)");
      $db->query("insert into RENDU_GROUPE(libelle, num_rendu) values ('INFO3B1', 8)");
      $db->query("insert into RENDU_GROUPE(libelle, num_rendu) values ('INFO3B1', 9)");
      $db->query("insert into RENDU_GROUPE(libelle, num_rendu) values ('INFO3A1', 5)");
      $db->query("insert into RENDU_GROUPE(libelle, num_rendu) values ('INFO3A1', 1)");
      $db->query("insert into RENDU_GROUPE(libelle, num_rendu) values ('INFO3A1', 8)");
      $db->query("insert into RENDU_GROUPE(libelle, num_rendu) values ('INFO3A2', 1)");

      //insertion des rendu_fini
      $db->query("insert into RENDU_FINI(id_eleve, id_rendu, date_rendu, temps) values ('bolleg', 1, '2020-11-15', '1h')");
      $db->query("insert into RENDU_FINI(id_eleve, id_rendu, date_rendu, temps) values ('boinetl', 1, '2020-11-13', '1h30')");
      $db->query("insert into RENDU_FINI(id_eleve, id_rendu, date_rendu, temps) values ('boinetl', 2, '2020-11-15', '2h30')");
      $db->query("insert into RENDU_FINI(id_eleve, id_rendu, date_rendu, temps) values ('boinetl', 3, '2020-11-18', '0.5h')");
      $db->query("insert into RENDU_FINI(id_eleve, id_rendu, date_rendu, temps) values ('boinetl', 4, '2020-11-20', '0.25h')");
      $db->query("insert into RENDU_FINI(id_eleve, id_rendu, date_rendu, temps) values ('boinetl', 5, '2020-11-19', '0.75h')");
      $db->query("insert into RENDU_FINI(id_eleve, id_rendu, date_rendu, temps) values ('boinetl', 6, '2020-11-29', '1h')");
      $db->query("insert into RENDU_FINI(id_eleve, id_rendu, date_rendu, temps) values ('boinetl', 7, '2020-11-12', '2h')");
      $db->query("insert into RENDU_FINI(id_eleve, id_rendu, date_rendu, temps) values ('boinetl', 8, '2020-11-13', '2h')");
      $db->query("insert into RENDU_FINI(id_eleve, id_rendu, date_rendu, temps) values ('bolleg', 2, '2020-11-14', '3h')");
      $db->query("insert into RENDU_FINI(id_eleve, id_rendu, date_rendu, temps) values ('bolleg', 3, '2020-11-15', '2.5h')");
      $db->query("insert into RENDU_FINI(id_eleve, id_rendu, date_rendu, temps) values ('bolleg', 4, '2020-11-16', '1.5h')");
      $db->query("insert into RENDU_FINI(id_eleve, id_rendu, date_rendu, temps) values ('bolleg', 5, '2020-11-17', '4h')");
      $db->query("insert into RENDU_FINI(id_eleve, id_rendu, date_rendu, temps) values ('ghanoucb', 3, '2020-11-18', '5h')");
      $db->query("insert into RENDU_FINI(id_eleve, id_rendu, date_rendu, temps) values ('bolleg', 6, '2020-11-20', '10h')");
      $db->query("insert into RENDU_FINI(id_eleve, id_rendu, date_rendu, temps) values ('bolleg', 7, '2020-11-26', '12h')");
      $db->query("insert into RENDU_FINI(id_eleve, id_rendu, date_rendu, temps) values ('robsont', 6, '2020-11-19', '1h')");

      //insert dans enseigne


      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFO1D1', 'M1101A')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFO1D2', 'M1101A')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO1B1', 'M1102')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO1B2', 'M1102')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('blanchoh', 'INFO1A1', 'M1102')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('blanchoh', 'INFO1A2', 'M1102')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('dupuys', 'INFO1D1', 'M1102')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('dupuys', 'INFO1D2', 'M1102')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('karouia', 'INFO1C1', 'M1102')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('karouia', 'INFO1C2', 'M1102')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('giuffrit', 'INFOS1dA1', 'M1102')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('giuffrit', 'INFOS1dA2', 'M1102')");

      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO1B1', 'M1103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO1B2', 'M1103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('blanchoh', 'INFO1A1', 'M1103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('blanchoh', 'INFO1A2', 'M1103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('giuffrit', 'INFO1D1', 'M1103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('giuffrit', 'INFO1D2', 'M1103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO1C1', 'M1103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO1C2', 'M1103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('giuffrit', 'INFOS1dA1', 'M1103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('giuffrit', 'INFOS1dA2', 'M1103')");

      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO1B1', 'M1103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO1B2', 'M1103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('blanchoh', 'INFO1A1', 'M1103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('blanchoh', 'INFO1A2', 'M1103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('giuffrit', 'INFO1D1', 'M1103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('giuffrit', 'INFO1D2', 'M1103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO1C1', 'M1103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO1C2', 'M1103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('giuffrit', 'INFOS1dA1', 'M1103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('giuffrit', 'INFOS1dA2', 'M1103')");

      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO1C1', 'M1104')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO1C2', 'M1104')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFO1A1', 'M1103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFO1A2', 'M1103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('dupuys', 'INFO1D1', 'M1103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('dupuys', 'INFO1D2', 'M1103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('dupuys', 'INFO1B1', 'M1103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('dupuys', 'INFO1B2', 'M1103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFOS1dA1', 'M1103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFOS1dA2', 'M1103')");

      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO1C1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO1C2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO1A1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO1A2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO1D1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO1D2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO1B1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO1B2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFOS1dA1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFOS1dA2', 'MRESP')");

      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO2C1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO2C2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO2A1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO2A2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO2D1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO2D2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO2B1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO2B2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFOS2dA1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFOS2dA2', 'MRESP')");

      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO3C1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO3C2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO3A1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO3A2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO3D1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO3D2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO3B1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO3B2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFOS3dA1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFOS3dA2', 'MRESP')");

      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO4C1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO4C2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO4A1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO4A2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO4D1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO4D2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO4B1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO4B2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFOS4dA1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFOS4dA2', 'MRESP')");

      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO1C1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO1C2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO1A1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO1A2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO1D1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO1D2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO1B1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO1B2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFOS1dA1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFOS1dA2', 'MRESP')");

      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO2C1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO2C2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO2A1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO2A2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO2D1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO2D2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO2B1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO2B2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFOS2dA1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFOS2dA2', 'MRESP')");

      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFO3C1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFO3C2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFO3A1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFO3A2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFO3D1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFO3D2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFO3B1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFO3B2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFOS3dA1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFOS3dA2', 'MRESP')");

      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFO4C1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFO4C2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFO4A1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFO4A2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFO4D1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFO4D2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFO4B1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFO4B2', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFOS4dA1', 'MRESP')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFOS4dA2', 'MRESP')");

      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFO3D1', 'M3101')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFO3D2', 'M3101')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('blanchoh', 'INFO3B1', 'M3103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('blanchoh', 'INFO3B2', 'M3103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('martinp', 'INFO3D1', 'M3103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('martinp', 'INFO3D2', 'M3103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO3C1', 'M3103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO3C2', 'M3103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('brunetf', 'INFO3B1', 'M3104')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('brunetf', 'INFO3B2', 'M3104')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO3B1', 'M3105')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO3B2', 'M3105')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('martinp', 'INFO3A1', 'M3105')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('martinp', 'INFO3A2', 'M3105')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('dupuys', 'INFO3D1', 'M3106C')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('dupuys', 'INFO3D2', 'M3106C')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('blancog', 'INFO3A1', 'M3203')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('blancog', 'INFO3A2', 'M3203')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('blancog', 'INFO3B1', 'M3203')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('blancog', 'INFO3B2', 'M3203')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('blancog', 'INFO3C1', 'M3203')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('blancog', 'INFO3C2', 'M3203')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('blancog', 'INFO3D1', 'M3203')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('blancog', 'INFO3D2', 'M3203')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('karouia', 'INFO2B1', 'M2104')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('karouia', 'INFO2B2', 'M2104')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('karouia', 'INFO2D1', 'M2104')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('karouia', 'INFO2D2', 'M2104')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO2C1', 'M2104')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO2C2', 'M2104')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('bleuser', 'INFO2A1', 'M2104')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('bleuser', 'INFO2A2', 'M2104')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('bleuser', 'INFO2A1', 'M2102')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('bleuser', 'INFO2A2', 'M2102')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('brunetf', 'INFO2B1', 'M2103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('brunetf', 'INFO2B2', 'M2103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('blanchoh', 'INFO2C1', 'M2103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('blanchoh', 'INFO2C2', 'M2103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO2A1', 'M2103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('goulianj', 'INFO2A2', 'M2103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('giuffrit', 'INFO2D1', 'M2103')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('giuffrit', 'INFO2D2', 'M2103')");

      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO2B1', 'M2106')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('lejeunea', 'INFO2B2', 'M2106')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('giuffrit', 'INFO2C1', 'M2106')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('giuffrit', 'INFO2C2', 'M2106')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFO2A1', 'M2106')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('gerotc', 'INFO2A2', 'M2106')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('giuffrit', 'INFO2D1', 'M2106')");
      $db->query("insert into ENSEIGNE(id_enseignant, groupe, module) values('giuffrit', 'INFO2D2', 'M2106')");

      $db->query("insert into NOTIFICATION(type, message, date_envoi, est_vu, id_eleve) values ('perm', 'Vos permissions ont été modifiées, vous avez maintenant le droit d ajouter des rendus', '2020-12-31', FALSE, 'boinetl')");
}catch(PDOException $e){
    die("DAO.php: Erreur de connexion -> ".$e->getMessage());
}
?>
