<?php
 require_once "fonctions/bdd.php";
 include_once "fonctions/blog.php";
 $bdd = bdd();
 $article = article();
 $nb_commentaires = nb_commentaires();
 $commentaires = commentaires();

?>



<?php
    include "partiels/header.php";
?>

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
   
<?php
    include "partiels/footer.php";
?>
