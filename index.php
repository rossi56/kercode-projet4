<?php
session_start();
 require_once "fonctions/bdd.php";
 include_once "fonctions/blog.php";
 $bdd = bdd();
 ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <title>Billet simple pour l'Alaska</title>
</head>

<body id="index">

    <header>
    <nav>
            <a href="index.php">Accueil</a>
            <a href="roman.php">Mon Roman</a>
            <?php
                if(isset($_SESSION["membre"])) :
            ?>
           <a href="compte.php">Mon compte</a>
            <a href="deconnexion.php">Deconnexion</a>
            <?php
                else :
            ?>
             <a href="connexion.php">Connexion</a>
            <a href="inscription.php">Inscription</a>
            
            <?php
                endif;
            ?>
            <a href="contact.php">Contact</a>
        </nav>
        <h1>Billet simple pour l'Alaska</h1>
        <p>"Le projet un peu fou d'un écrivain voyageur"</p>
        <form method="post" action="roman.php">
                    <input class="search" type="text" name="query" placeholder="Recherche.." value="<?php if(isset($_POST["query"])) echo $_POST["query"]//laisser champs de recherche rempli ?>">
        </form>
        <p id="by">
            <span> By</span> Jean Forteroche</p>
        </div>
        <video id="video" loop autoplay muted src="video/Snow.mp4"></video>
        <div class="pattern"></div>
        <button id="pause"><i class="far fa-pause-circle fa-3x"></i></button>
        <div class="burger">
            <svg width="100px" height="100px">
                <path class="top" d="M 30 40 L 70 40 C 90 40 90 75 60 85 A 40 40 0 0 1 20 20 L 80 80"></path>
                <path class="middle" d="M 30 50 L 70 50"></path>
                <path class="bottom" d="M 70 60 L 30 60 C 10 60 10 20 40 15 A 40 38 0 1 1 20 80 L 80 20"></path>
            </svg>
        </div>
        <div class="mask"></div>
    </header>
    <main>
        <section id='split'>
            <article class="blog">
                <h2>Blog</h2>
                <p>"Les plus belles histoires commencent
                    <br> toujours par un naufrage"
                    <br>
                    <span>Jack London</span>
                </p>
                <figure class="book">
                    <img src="img/blog.png" alt="Book">
                </figure>
                <img id="punaise2" src="img/punaise.png" alt="Punaise-2">
                <a class="enter" href="roman.php">Entrez !</a>
            </article>
            <article class="about">
                <h2 class="projet">Le Projet</h2>

                <h3>"Qui suis-je ?"</h3>
                <figure class="portrait">
                    <img src="img/portrait.png" alt="Portrait">
                </figure>
                <img id="punaise" src="img/punaise.png" alt="Punaise">
                <p class="text">
                    <strong>Jean Forteroche.....</strong>c'est moi! Aventurier avant de devenir écrivain, les grands espaces m'ont
                    toujours inspirés.
                    <br> L'aventure et l'écriture, deux mots qui résonnent à mon oreille. Leur murmure est une ode à l'escapade
                    et à la flânerie.
                    <br> Mon esprit vagabonde vers de nouveaux espaces que je vais vous faire découvrir par mes écrits.
                    <br> Cette idée un peu folle, mais qui me ressemble tant; de vous faire découvrir les endroits vers lesquels
                    mes rêves me portent; au travers de ce blog mis à jour au fur et à mesure de la rédaction de mon roman.
                    <br> Je vous souhaite une lecture des plus distrayante. Je reste à votre disposition pour communiquer au
                    travers de ce blog, alors n'hésitez pas.....
                    <br>
                    <span>Je vous attends!</span>
                </p>

            </article>
        </section>
    </main>
    <footer>
        <div id="adress">
            Jean Forteroche
            <br>4050 University Lake Dr,
            <br> Anchorage,
            <br> AK 99508-4600
            <br> Etats Unis
        </div>
       

        <div id="reseaux">
            <img id="fb" src="img/facebook.png" alt="facebook">
            <img src="img/twitter.png" alt="twitter" id="tw">
            <a href="#" id="tw"></a>
            <a href="#" id="lk"></a>
            <a href="#" id="inst"></a>
        </div>
        <p id="copy">Copyright Kercode 2018 - Site réalisé à des fins pédagogiques</p>
        <div class="patternFooter"></div>
    </footer>


    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQfpft0MIiwF4INGm3uMGrylY7OqBujG4 &callback=initMap">
    </script>
    <script src="js/map.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/split.js"></script>

</body>

</html>