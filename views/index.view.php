<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jabami - Sauveur de confinement</title>
    <script src="https://kit.fontawesome.com/ae7adf6d8c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/public/css/owl/owl.carousel.min.css">
    <link rel="stylesheet" href="/public/css/owl/owl.theme.default.min.css">
    <link rel="stylesheet" href="/public/css/bulma.min.css">
    <!-- <link rel="stylesheet" href="../public/css/debug.css"> -->
    <link rel="stylesheet" href="/public/css/style.css">
    <title>Jabami</title>
</head>
<body>
    <section class="hero is-fullheight" id="landing">
        <div id="overlay"></div>
            <div class="columns is-mobile is-marginless heading has-text-weight-bold">
                <header>
                    <div class="column left">
                        <figure class="image is-64x64">
                            <img src="/public/img/logo.svg" alt="logo jabami">
                        </figure>
                    </div>
                    <div class="column right is-flex is-justify-content-flex-end">
                        <a href="/login"><h3 class="title is-7 has-text-white"><?= isset($_SESSION['SESSID']) ? 'Tableau de bord' : 'Se connecter' ?></h3></a>
                    </div>
                </header>
            </div>
            <div class="columns">
                <div class="column is-flex is-justify-content-center is-align-items-center is-flex-direction-column main-hero">
                    <h1>JABAMI</h1>
                    <p>L'outil de suivi qui vous aidera tout au long de votre formation.</p>
                </div>
            </div>
    </section>
    <section id="overview">
        <div class="container">
            <div id="carousel" class="owl-carousel owl-theme">
                <div class="item"><img src="/public/img/slider2-min.jpg"></div>
                <div class="item"><img src="/public/img/slider3-min.jpg"></div>
                <div class="item"><img src="/public/img/slider1-min.jpg"></div>
            </div>
        </div>
    </section>
    <section id="app_car">
        <div id="items_container">
            <div class="item">
                <i class="fas fa-globe-europe"></i>
                <h3>Centralisation des données</h3>
                <p>Vous retrouverez dans notre application ce qui vous est nécessaire, tel que votre charge de travail, vos rendus et agenda.</p>
            </div>
            <div class="item">
                <i class="fas fa-sitemap"></i>
                <h3>Facilité d'utilisation</h3>
                <p>Jabami est fait en sorte de vous simplifier la tâche, vous n'avez besoin que de simples clics pour trouver ce que vous cherchez.</p>
            </div>
            <div class="item">
                <i class="fas fa-sliders-h"></i>
                <h3>Un outil essentiel</h3>
                <p>Jabami est votre outil. Il vous permet de vous organiser au mieux dans votre travail.</p>
            </div>
        </div>
    </section>
    <footer class="is-flex is-justify-content-space-between is-align-items-center">
        <img src="/public/img/logo_iut2.png">
        <div>
            <ul>
                <li>04 76 28 45 09</li>
                <li>email.email@univ-grenoble-alpes.fr</li>
                <li>IUT 2, Place Doyen Gosse, 38000 Grenoble</li>
            </ul>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/public/js/owl/owl.carousel.min.js"></script>
    <script src="/public/js/index.js"></script>
</body>
</html>