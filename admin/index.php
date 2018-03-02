<?php
require_once "../fonctions/bdd.php";
include_once "../fonctions/admin.php";
$bdd = bdd();
if(!empty($_POST))
    $erreurs = poster();
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../css/main.css">
        <title>Billet simple pour l'Alaska</title>
    </head>

    <body>
        <header>
        <nav>
            <a href="index.php">Nouveau post</a>
            <a href="posts.php">Anciens posts</a>
        </nav>
        <img class="pref-img" src="../img/admin.png" alt="Préface">
        <img class="portrait" src="../img/portrait.png" alt="portrait">
        <div class="pattern"></div>
        <div class="burger">
            <svg width="100px" height="100px">
                <path class="top" d="M 30 40 L 70 40 C 90 40 90 75 60 85 A 40 40 0 0 1 20 20 L 80 80"></path>
                <path class="middle" d="M 30 50 L 70 50"></path>
                <path class="bottom" d="M 70 60 L 30 60 C 10 60 10 20 40 15 A 40 38 0 1 1 20 80 L 80 20"></path>
            </svg>
        </div>
        <div class="mask"></div>
        <div class="admin">
            <p class="admin-post">"Publier un article"</p>
            <form method="post" action="" enctype="multipart/form-data">
        <?php
            if(isset($erreurs)) :
            if($erreurs) :
            foreach($erreurs as $erreur) :
        ?>
        <div class="message erreur">
        <?= $erreur ?>
        </div>
        <?php
            endforeach;
            else :
        ?>
        <div class="confirm">Votre article a bien été publié !</div>
        <?php
            endif;
            endif;
        ?>
                <input type="text" name="titre" placeholder="Titre de l'article *" value="<?php if(isset($_POST[" titre "])) echo $_POST["titre "] ?>">
                <p class="insert-pres">Insérer la photo de présentation</p>
                <input type="file" name="file">
                <p class="insert-art">Insérer la photo de l'article</p>
                <input type="file" name="file2">
                <textarea name="contenu" placeholder="Corps de l'article *"><?php if(isset($_POST["contenu"])) echo $_POST["contenu"] ?>
                </textarea>
                <input type="submit" value="Publier !">
            </form>

        </div>
    </header>
      
    </body>

    </html>