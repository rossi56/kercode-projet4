<?php
 require_once "fonctions/bdd.php";
 include_once "fonctions/blog.php";
 $bdd = bdd();
 $article = article($_GET["id"]);
 $nb_commentaires = nb_commentaires($_GET["id"]);
 $commentaires = commentaires($_GET["id"]);
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

<body>
        <header>
                <h1>Billet simple pour l'Alaska</h1>
                <p>"Le projet un peu fou d'un écrivain voyageur"</p>
                <form>
                    <input class="search" type="text" name="search" placeholder="Recherche..">
                </form>
                <p id="by">
                    <span> By</span> Jean Forteroche</p>
                <nav>
                    <a href="index.php">Accueil</a>
                    <a href="roman.php">Roman</a>
                    <a id="connect" href="#">Connexion</a>
                    <a id="inscription" href="#">Inscription</a>
                    <a href="contact.php">Contact</a>
                </nav>
                <img class="pref-img" src="img/book.png" alt="Préface">
                <div class="pattern"></div>
                <div class="pop-inscription">
                    <img class="cross" src="img/cross.svg" alt="croix">
                    <h3>Inscrivez-vous !</h3>
                    <h4>Ne rater pas les derniers articles !</h4>
                    <form action="">
                        <input type="text" placeholder="Votre Prénom">
                        <input type="text" placeholder="Votre Nom">
                        <input type="email" placeholder="Votre e-mail">
                        <input type="text" placeholder="Mot de Passe">
                    </form>
                    <button class="btn-submit" type="submit">S'inscrire</button>
                </div>
                <div class="pop-connect">
                    <img class="cross" src="img/cross.svg" alt="croix">
                    <h3>Connectez-vous !</h3>
                    <form action="">
                        <input type="email" placeholder="Identifiant">
                        <input type="text" placeholder="Mot de Passe">
                    </form>
                    <button class="btn-submit" type="submit">Connexion</button>
                </div>
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
        
            <article class="preface">
                <h2><?= $article["titre"] ?></h2>
                <p class="date">Posté le <time datetime="<?= $article["publication"] ?> "><?= formatage_date($article["publication"]) ?></time> </p>
                <img src="img/<?= $article["imageArt"] ?>" alt="<?= $article["imageArt"] ?>">
                <p><?= $article["contenu"] ?>
                </p>
            </article>
        <div class="bg1"></div>
       
        <section class="comments">
            
            <h2>Commentaires (<?= $nb_commentaires ?>)</h2>
            
            <?php
            foreach($commentaires as $commentaire) :
            ?>
            <p class="date">Posté par <?= $commentaire["pseudo"] ?> le <time datetime="<?= $commentaire["publication"] ?>" ><?= formatage_date($commentaire["publication"]) ?></time> </p>
            <p><?= $commentaire["commentaire"] ?></p>
        </section>
        <?php
        endforeach;
        ?>
    </section>
    <footer>
            <div id="adress">
                Jean Forteroche <br>4050 University Lake Dr, <br> Anchorage, <br> AK 99508-4600 <br> Etats Unis
            </div>
         
            <p id="copy">Copyright Kercode 2018 - Site réalisé à des fins pédagogiques</p>
            <ul id="reseaux">
                <a href="#" id="fb"></a>
                <a href="#" id="tw"></a>
                <a href="#" id="lk"></a>
                <a href="#" id="inst"></a>
            </ul>
        </footer>
</main>

<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQfpft0MIiwF4INGm3uMGrylY7OqBujG4 &callback=initMap">
</script>
<script src="js/map.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="js/script.js"></script>
<script src="js/split.js"></script>

</body>

</html>