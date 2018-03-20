<?php
require_once "../fonctions/bdd.php";
include_once "../fonctions/admin.php";
$bdd = bdd();
$post = post();
if(!empty($_POST))
    $erreur = modifier();
?>
<!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../css/main.css">
        <title>Billet simple pour l'Alaska</title>
    </head>
<body>
    <header>   
        <a class="lien-admin" href="index.php">Jean Forteroche - admin</a>
            <nav>
                <a href="index.php">Nouveau post</a>
                <a href="posts.php">Anciens posts</a>      
            </nav>
            <img class="pref-img" src="../img/admin.png" alt="Préface">
        <div class="pattern"></div>
        <div class="burger">
            <svg width="100px" height="100px">
                <path class="top" d="M 30 40 L 70 40 C 90 40 90 75 60 85 A 40 40 0 0 1 20 20 L 80 80"></path>
                <path class="middle" d="M 30 50 L 70 50"></path>
                <path class="bottom" d="M 70 60 L 30 60 C 10 60 10 20 40 15 A 40 38 0 1 1 20 80 L 80 20"></path>
            </svg>
        </div>
        <div class="mask"></div>
        <div class="admin posts">
            <h2 class="titre-admin"><?= $post["titre"] ?></h2>   
        <form method="post" action="">
    <?php
        if(isset($erreur)) :
        if($erreur) :
    ?>
        <div class="message erreur"><?= $erreur ?></div>
    <?php
        else :
    ?>
         <div class="confirm">Votre article a bien été modifié !</div>
    <?php
        endif;
        endif;
    ?>
            <input type="text" name="titre" placeholder="Titre *" value="<?= $post["titre"] ?>">
            <!-- remplacement balises br strreplace -->
            <textarea name="contenu" placeholder="Corps de l'article *"><?=str_replace("<br />", "", $post["contenu"]) ?></textarea>
            <!-- <p class="modif-pres">Insérer la photo de présentation</p>
                <input type="file" name="file">
                <p class="modif-art">Insérer la photo de l'article</p>
                <input type="file" name="file2"> -->
            <input type="submit" value="Modifier">
        </form>
    </header> 
  
</body>
</html>