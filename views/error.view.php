<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/css/bulma.min.css">
    <link rel="stylesheet" href="/public/css/error.css">
    <!-- <link rel="stylesheet" href="../public/css/debug.css"> -->
    <title>Jabami - Oops !</title>
</head>
<body>
<section class="is-flex is-justify-content-center is-align-items-center">
    <div class="box is-flex is-justify-content-center is-align-items-center is-flex-direction-column">
        <img src="/public/img/404.png" alt="error image" class="mb-4">
        <div class="is-flex is-align-items-center is-flex-direction-column mb-3">
            <h4 class="title">Oops, on dirait que quelque chose ne va pas...</h4>
            <p><?= $message ?></p>
        </div>
        <a href="/dashboard/1/<?= explode(', ', $_SESSION['SESSID']['groupe'])[0] ?>" class="button">Tableau de bord</a>
    </div>
</section>
</body>
</html>
