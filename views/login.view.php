<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/bulma.min.css">
    <link rel="stylesheet" href="/public/css/login.css">
    <!-- <link rel="stylesheet" href="../public/css/debug.css"> -->
    <title>Jabami - Login</title>
</head>
<body>
<section class="hero is-fullheight is-flex is-justify-content-center is-align-items-center">
    <div id="overlay"></div>
    <div class="formulaire">
        <div class="is-flex is-flex-direction-column p-3">
            <h1 class="title is-4 mx-0 mt-0" style='font-size: 1.8em;margin: 1rem .5rem 1.5rem .5rem;'>Se connecter</h1>
            <?php if(isset($errorMessage)){ ?>
                <article class="message is-danger mb-3">
                    <div class="message-body py-3"><?= $errorMessage ?></div>
                </article>    
            <?php } ?>
            <form class="form" method="POST">
                <div class="field m-0">
                    <div class="control">
                        <input class="input" type="text" name="uga_id" placeholder="Identifiant UGA"><br>
                    </div>
                </div>
                <div class="field m-0">
                    <div class="control">
                        <input class="input" type="password" name="password" placeholder="Mot de passe"><br>
                    </div>
                </div>
                <p>En vous connectant, vous acceptez les <a href="/docs/Condition_generation_dutilisation.pdf" target="_blank" style="text-decoration: none; color: #d44747;">Conditions Générales d’Utilisation</a>.</p>
                <div class="field is-grouped mt-3">
                    <div class="control p-0">
                        <button class="button" type="submit">Se connecter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
</body>
</html>