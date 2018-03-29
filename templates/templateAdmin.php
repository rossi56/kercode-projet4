<!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="public/css/main.css">
        <title>Billet simple pour l'Alaska</title>
    </head>

    <body>
        <header>
            <h1><?= $titleHeader ?></h1>
        <nav>
            <a href="index.php?action=articles">Le roman</a>
            <a href="admin.php?action=admin">Administration</a>
            <a href="admin.php?action=publication">Nouveau post</a>
            <a href="admin.php?action=edition">Anciens posts</a>
            <a href="admin.php?action=deconnexion">Déconnexion</a>
        <form method="post" action="index.php?action=query">
            <input class="search" type="search" name="query" placeholder="Recherche.." value="<?php if(isset($_POST[" query
                "])) echo $_POST["query "]//laisser champs de recherche rempli ?>">
        </form>
        </nav>
        <video id="video" autoplay loop src="<?= $video  ?>"></video>
        <button id="pause">
                    <i class="far fa-pause-circle fa-3x"></i>
                </button>
                
        <div class="pattern"></div>
        <div class="burger">
            <svg width="100px" height="100px">
                <path class="top" d="M 30 40 L 70 40 C 90 40 90 75 60 85 A 40 40 0 0 1 20 20 L 80 80"></path>
                <path class="middle" d="M 30 50 L 70 50"></path>
                <path class="bottom" d="M 70 60 L 30 60 C 10 60 10 20 40 15 A 40 38 0 1 1 20 80 L 80 20"></path>
            </svg>
        </div>
        <div class="mask"></div>
            </header>
            
            <section class="container">
            <img class="portrait" src="public/img/portrait.png" alt="portrait">
              <?= $content ?>
            <div class="bg"></div>
            <div class="scrollTop">
              <i class="fas fa-angle-double-up "></i>
            </div>
            </section>

<script src="public/js/tinymce/tiny_mce.js"></script>
<script src="public/js/tiny.js"></script>
<?php include 'views/footer.php' ?>

