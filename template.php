<!DOCTYPE html>
    <html lang="fr">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="public/css/main.css">
            <title>Billet simple pour l'Alaska</title>
        </head>

        <body id="index">
            <header>
                <h1>Billet simple pour l'Alaska</h1>
                <p>"Le projet un peu fou d'un écrivain voyageur"</p>
                <form method="post" action="roman.php">
                    <input class="search" type="text" name="query" placeholder="Recherche.." value="<?php if(isset($_POST["query"])) echo $_POST["query"]//laisser champs de recherche rempli ?>">
                </form>
                <p id="by">
                    <span> By</span> Jean Forteroche</p>
                <?php
                    include 'views/navigationView.php';
                ?>
                <video id="video" autoplay loop src="public/video/lettres.mp4"></video>
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
            <section class="container">
              <?= $content ?>
            <div class="bg"></div>
            </section>
            <footer>
               
                <div id="adress">
                    Jean Forteroche
                    <br>4050 University Lake Dr, Anchorage,
                    <br> AK 99508-4600 Etats Unis
                </div>
                <p id="copy">Copyright Kercode 2018 - Site réalisé à des fins pédagogiques</p>
                <ul id="reseaux">
                    <a href="#" id="fb"><img src="public/img/facebook.png" alt="facebook"></a>
                    <a href="#" id="tw"><img src="public/img/twitter.png" alt="twitter"></a>
                    <a href="#" id="lk"></a>
                    <a href="#" id="inst"></a>
                </ul>
            </footer>
            </main>

            <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQfpft0MIiwF4INGm3uMGrylY7OqBujG4 &callback=initMap">
            </script>
            <script src="js/map.js"></script>
            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
            <script src="js/script.js"></script>
            <script src="js/split.js"></script>

        </body>
   </html>
  