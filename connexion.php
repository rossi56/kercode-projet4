<?php
session_start();
 require_once "fonctions/bdd.php";
 include_once "fonctions/membre.php";
 $bdd = bdd();
 if(!empty($_POST))
 $erreur = connexion();
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
                <h3>Connectez-vous !</h3>
                <p>"Le projet un peu fou d'un écrivain voyageur"</p>
                <form method="post" action="roman.php">
                    <input class="search" type="text" name="query" placeholder="Recherche.." value="<?php if(isset($_POST["query"])) echo $_POST["query"]//laisser champs de recherche rempli ?>">
                </form>
                <p id="by">
                    <span> By</span> Jean Forteroche</p>
                <nav>
                    <a href="index.php">Accueil</a>
                    <a href="roman.php">Roman</a>
                    <a id="connect" href="connexion.php">Connexion</a>
                    <a id="inscription" href="inscription.php">Inscription</a>
                    <a href="contact.php">Contact</a>
                </nav>
                <img class="pref-img" src="img/connexion.png" alt="Préface">
                <div class="pattern"></div>
               
                <div class="connexion">
                 
                 
                 <form method="post" action="">
                 <?php
                     if(isset($erreur)) : 
                 ?>
                         <!-- affichage de ce message en cas d'erreur -->
                     <div class="erreur"><?= $erreur ?></div>
                 <?php
                 ?>                      
                 <?php
                     endif;
                 ?>
                     <input type="text" name="pseudo" placeholder="Pseudo" value="<?php if(isset($_POST["pseudo"])) echo ($_POST["pseudo"]) ?>">
                     <input type="password" name="password" placeholder="Mot de Passe">
                     <input class="btn-submit" type="submit" value="Connexion">
                 </form>
                
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


