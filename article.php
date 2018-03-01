<?php
session_start();
 require_once "fonctions/bdd.php";
 include_once "fonctions/blog.php";
 $bdd = bdd();
 $article = article();
 $nb_commentaires = nb_commentaires();
 $commentaires = commentaires();
 if(!empty($_POST))
    $erreur = commenter();
   

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
            
            <h2><?= $nb_commentaires ?> commentaire(s)</h2>
            
            <?php
            foreach($commentaires as $commentaire) :
            ?>
            <p class="date">Posté par <?= $commentaire["pseudo"] ?> le <time datetime="<?= $commentaire["publication"] ?>" ><?= formatage_date($commentaire["publication"]) ?></time> </p>
            <img src="img/<?= $commentaire["avatar"] ?>" alt="Avatar">
            <p>"<?= $commentaire["commentaire"] ?>"</p>
           
        
            <?php
            endforeach;
            if(isset($_SESSION["membre"])) :
            ?>
                <form method="post" action="">
                <?php
                    if(isset($erreur)) :
                    if($erreur) :  
                 ?>
                            <!-- affichage de ce message en cas d'erreur -->
                            <div class="message-erreur">
                                <?= $erreur ?>
                            </div>
                <?php
                else :
                ?>
                                <!-- affichage de ce message s'il n'y a pas d'erreur -->
                                <div id="post">
                                    <h2>Votre commentaire a bien été posté !</h2>
                                    <i class="far fa-check-circle"></i>
                                </div>
                                <?php
                    endif;
                    endif;
                 ?>
                    <textarea name="commentaire" id="commentaire" cols="30" rows="10" placeholder="Laissez votre commentaire !"></textarea>
                    <input type="submit" value="Commenter">
                </form>
            <?php
            endif;
            ?>    

        </section>
    </section>
   
<?php
    include "partiels/footer.php";
?>
