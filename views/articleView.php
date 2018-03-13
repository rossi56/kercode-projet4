<?php $title = "Billet simple pour l'Alaska;" ?>
<?php ob_start(); ?>
    <article class="preface">
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
        <p class="date">Posté par <?= $commentaire["pseudo"] ?> le <time datetime="<?= $commentaire["publication"] ?>" ><?= $commentaire["publication"] ?></time> </p>
            <img src="public/img/<?= $commentaire["avatar"] ?>" alt="Avatar">
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
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
    