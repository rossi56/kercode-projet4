<?php
require_once "../fonctions/bdd.php";
include_once "../fonctions/admin.php";
$bdd = bdd();
$posts = posts();
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
        <div class="posts">
        <h2 class="titre-admin">Anciens posts !</h2>
            <table>
        <?php
            foreach($posts as $post) :
        ?>
            <tr>
                <td><?= $post["titre"] ?></td>
                <td><a href="modifier.php?id=<?= $post["id"] ?>"><i class="fas fa-pencil-alt"></i></a></td>
                <td><a href="supprimer.php?id=<?= $post["id"] ?>"><i class="fas fa-times"></i></a></td>
            </tr>
        <?php
            endforeach;
        ?>
            </table>
          
            </div>   
    </header>
     
    
</body>
</html>