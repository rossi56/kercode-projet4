<?php
$title = "Les Chapitres"; 
$titleHeader = "";
$video = 'public/video/roman.mp4';
$image = ''
?>


<?php ob_start(); ?>
<section class="chapitre">
    <article class="article">
        <h2><?= $article["titre"] ?></h2>
            <p class="date">Posté le <time datetime="<?= $article["publication"] ?> "><?= $article["publication"] ?></time> </p>
                <img class="chapitre" src="public/img/<?= $article["imageArt"] ?>" alt="<?= $article["imageArt"] ?>">
            <p><?= $article["contenu"] ?></p>
    </article>
    
<section class="comments">
    <h2><?= $nb_commentaires ?> commentaire(s)</h2>
<?php
    foreach($commentaires as $commentaire) :
?>
    <article class="commentaires">
            <p class="date"><img src="public/img/avatars/<?= $commentaire["avatar"] ?>" alt="Avatar">Posté par <?= $commentaire["pseudo"] ?> le <time datetime="<?= $commentaire["publication"] ?>" ><?= $commentaire["publication"] ?></time>  </p>    
            <p class="comment">"<?= $commentaire["commentaire"] ?>"</p>
            <a href="index.php?action=signaler&id=<?= $commentaire['id'] ?>&id_article=<?= $commentaire['id_article'] ?>">Signaler le commentaire</a>
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
</section>

<?php $content = ob_get_clean(); ?>
<?php require('templates/template.php'); ?>
    