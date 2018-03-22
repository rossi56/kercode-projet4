<?php
$title = "Les Chapitres"; 
$titleHeader = "Bonne lecture";
$video = '';
$image = 'public/img/book2.png'
?>


<?php ob_start(); ?>

    <article class="article">
        <h2><?= $article["titre"] ?></h2>
            <p class="date">Posté le <time datetime="<?= $article["publication"] ?> "><?= $article["publication"] ?></time> </p>
                <img src="public/img/<?= $article["imageArt"] ?>" alt="<?= $article["imageArt"] ?>">
            <p><?= $article["contenu"] ?></p>
    </article>
    
<section class="comments">
    <h3><?= $nb_commentaires ?> commentaire(s)</h3>
<?php
    foreach($commentaires as $commentaire) :
?>
    <article class="commentaires">
            <p class="date"><img src="public/img/<?= $commentaire["avatar"] ?>" alt="Avatar">Posté par <?= $commentaire["pseudo"] ?> le <time datetime="<?= $commentaire["publication"] ?>" ><?= $commentaire["publication"] ?></time>  </p>    
            <p class="comment">"<?= $commentaire["commentaire"] ?>"</p>
    </article>

<?php
    endforeach;
    if(isset($_SESSION["membre"])) :
?>
    <form method="post" action="index.php?action=commenter&amp;id=<?= $_GET['id']; ?>">
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

<?php $content = ob_get_clean(); ?>
<?php require('templates/template.php'); ?>
    