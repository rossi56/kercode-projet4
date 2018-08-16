<!DOCTYPE html>
    <html lang="fr">

        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="Roman de Jean Forteroche">
        <meta name="keywords" content="blog, roman, Jean, Forteroche, aventurier, romancier">
        <link rel="apple-touch-icon" sizes="57x57" href="public/img/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="public/img/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="public/img/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="public/img/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="public/img/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="public/img/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="public/img/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="public/img/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="public/img/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="public/img/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="public/img/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="public/img/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="public/img/favicon/favicon-16x16.png">
        <link rel="manifest" href="public/img/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" href="public/css/main.css">
        <title>Billet simple pour l'Alaska</title>
    </head>


        <body>
            <header>
                <p>"Le projet un peu fou d'un écrivain voyageur"</p>
                
                <p id="by">
                    <span> By</span> Jean Forteroche</p>
                    <nav>
    <a class="line" href="home.php">Accueil</a>
    <a class="line" href="index.php?action=articles">Le Roman</a>
<?php
    if(isset($_SESSION["membre"])) :
?>
        <a class="line" href="index.php?action=compte">Mon Profil</a>
        <a class="line" href="index.php?action=deconnexion">Deconnexion</a>
        
<?php
    else :
?>
        <a class="line" href="index.php?action=pageConnexion">Connexion</a>
        <a class="line" href="index.php?action=inscription">Inscription</a>

<?php
    endif;
?>
        <a class="line" href="index.php?action=contact">Contact</a>
        <a class="line" href="admin.php?action=admin">Administration</a>
    <form method="post" action="index.php?action=query">
        <input class="search" type="search" name="query" placeholder="Recherche.." value="<?php if(isset($_POST[" query
                        "])) echo $_POST["query "]//laisser champs de recherche rempli ?>">
    </form>
</nav>
                 
                <video id="video" autoplay loop src="<?= $video  ?>"></video>
                <img class="pref-img" src= "<?= $image?>">
                <div class="pattern"></div>
                <button id="pause">
                    <i class="far fa-pause-circle fa-3x"></i>
                </button>
                
                <div class="burger">
                    <svg width="100px" height="100px">
                        <path class="top" d="M 30 40 L 70 40 C 90 40 90 75 60 85 A 40 40 0 0 1 20 20 L 80 80"></path>
                        <path class="middle" d="M 30 50 L 70 50"></path>
                        <path class="bottom" d="M 70 60 L 30 60 C 10 60 10 20 40 15 A 40 38 0 1 1 20 80 L 80 20"></path>
                    </svg>
                </div>
                <div class="mask"></div>
            </header>