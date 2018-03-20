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
            <a href="index.php?action=admin">Nouveau post</a>
            <a href="index.php?action=edition">Anciens posts</a>
            <a href="index.php?action=deconnexion">Déconnexion</a>
        </nav>
        <img class="pref-img" src="public/img/admin.png" alt="Préface">
        <img class="portrait" src="public/img/portrait.png" alt="portrait">
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
              <?= $content ?>
            <div class="bg"></div>
            </section>

    </section>
    <footer>
        <div id="adress">
            Jean Forteroche
            <br>4050 University Lake Dr,Anchorage,
            <br> AK 99508-4600 Etats Unis
        </div>
       

        <div id="reseaux">
            <img id="fb" src="public/img/facebook.png" alt="facebook">
            <img src="public/img/twitter.png" alt="twitter" id="tw">
        </div>
        <p id="copy">Copyright Kercode 2018 - Site réalisé à des fins pédagogiques</p>
    </footer>
            </main>

            <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
            <script src="public/js/tinymce/tiny_mce.js"></script>
            <script src="public/js/tiny.js"></script>
        </body>
   </html>
    </body>

    </html>
  