<?php
session_start();
if(!isset($_SESSION["membre"]))
    header("Location: connexion.php");//redirection si le visiteur n'est pas connecté vers l'espace connexion
require_once "fonctions/bdd.php";
include_once "fonctions/membre.php";
include_once "fonctions/blog.php";
$bdd = bdd();
$infos = infos();
$commentaires = commentaires_user();
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
        <h2>Bienvenue <?= $infos["pseudo"] ?></h2>
        <h3>Vos derniers commentaires</h3>
        <img class="avatar" src="img/<?= $infos["avatar"] ?>" alt="Avatar">
        <p class="email">Adresse e-mail : <?= $infos["email"] ?></p>
        <form method="post" action="roman.php">
                    <input class="search" type="text" name="query" placeholder="Recherche.." value="<?php if(isset($_POST["query"])) echo $_POST["query"]//laisser champs de recherche rempli ?>">
        </form>
        </div>
        <img class="pref-img" src="img/compte.png" alt="Préface">
        <div class="pattern"></div>
       
        <div class="burger">
            <svg width="100px" height="100px">
                <path class="top" d="M 30 40 L 70 40 C 90 40 90 75 60 85 A 40 40 0 0 1 20 20 L 80 80"></path>
                <path class="middle" d="M 30 50 L 70 50"></path>
                <path class="bottom" d="M 70 60 L 30 60 C 10 60 10 20 40 15 A 40 38 0 1 1 20 80 L 80 20"></path>
            </svg>
        </div>
        <div class="mask"></div>
   
    
    <div class="comments">
    <?php
        foreach($commentaires as $commentaire) :
    ?>
   <p class="date">Posté sur l'article "<?= $commentaire["titre"] ?>" le <time datetime="<?= $commentaire["publication"] ?>"><?= formatage_date($commentaire["publication"]) ?></time> :</p>
    <p><?= $commentaire["commentaire"] ?></p>
    <?php
        endforeach;
    ?>
    </div>  

     </header>