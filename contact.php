<?php
 require_once "fonctions/bdd.php";
 include_once "fonctions/contact.php";
 $bdd = bdd();
 if(!empty($_POST))
 $erreurs = contact();//retourne les erreurs dans le formulaire
 
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

        <body>
            <header>
                <nav>
                    <a href="index.php">Accueil</a>
                    <a href="roman.php">Roman</a>
                    <a id="connect" href="#">Connexion</a>
                    <a id="inscription" href="#">Inscription</a>
                    <a href="contact.php">Contact</a>
                </nav>

                <video id="video" loop autoplay muted src="video/aircraft - 7180.mp4"></video>
                <div id="contenu">
                    <h2 class="titre-contact">Contact</h2>
                </div>
                <div class="pattern"></div>
                <button id="pause">
                    <i class="far fa-pause-circle fa-3x"></i>
                </button>

                <form method="post" action="roman.php">
                    <input class="search" type="text" name="query" placeholder="Recherche.." value="<?php if(isset($_POST[" query
                        "])) echo $_POST["query "]//laisser champs de recherche rempli ?>">
                </form>
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
            <section id="contact">
                <div id="find">
                    <h2>Me Trouver</h2>
                    <div id="map"></div>
                    <!-- formulaire de contact -->

                </div>
                <div class="mail">
                    <h3>Contactez-moi !</h3>
                    <h4>Je vous réponds rapidement !</h4>
                    <form method="post" action="">
                        <?php
                    if(isset($erreurs)) :
                    if($erreurs) :
                        // BOUCLE POUR L'AFFICHAGE DES MESSAGES D'ERREURS
                    foreach($erreurs as $erreur)  :   
                 ?>
                            <!-- affichage de ce message en cas d'erreur -->
                            <div class="message erreur">
                                <?= $erreur ?>
                            </div>
                            <?php
                endforeach;
                else :
                ?>
                                <!-- affichage de ce message s'il n'y a pas d'erreur -->
                                <div id="envoi">
                                    <h2>Votre message a été envoyé !</h2>
                                    <i class="far fa-check-circle"></i>
                                </div>
                                <?php
                    endif;
                    endif;
                 ?>
                                    <input type="text" name="prenom" placeholder="Votre Prénom *" value="<?php if(isset($_POST[" prenom "])) echo $_POST["prenom
                                        "] ?>">
                                    <input type="text" name="nom" placeholder="Votre Nom *" value="<?php if(isset($_POST[" nom "])) echo $_POST["nom "] ?>">
                                    <input type="email" name="email" placeholder="Votre e-mail *" value="<?php if(isset($_POST[" email "])) echo $_POST["email
                                        "] ?>">
                                    <textarea name="texte" placeholder="Votre message *">
                                        <?php if(isset($_POST["texte"])) echo $_POST["texte"] ?>
                                    </textarea>
                                    <input type="submit" value="Envoyer">
                    </form>

                </div>
            </section>
            <?php
    include "partiels/footer.php";
?>