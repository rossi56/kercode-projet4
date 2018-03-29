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
                <img class="chapitre" src="public/img/article/<?= $article["imageArt"] ?>" alt="<?= $article["imageArt"] ?>">
            <p><?= $article["contenu"] ?></p>
    </article>
    <?php
   ;
    if(isset($_SESSION["membre"])) :
?>

    <form class="formulaire" method="post" action="index.php?action=commenter&id=<?= $_GET['id']; ?>">
<?php
    $erreurs = ControllerChapitre::getErreur() ;
    if(isset($erreurs)) :
    if($erreurs) :  
        // BOUCLE POUR L'AFFICHAGE DES MESSAGES D'ERREURS
    foreach($erreurs as $erreur)  : 
?>
<!-- affichage de ce message en cas d'erreur -->
    <div class="message erreur envoi">
        <?= $erreur ?>
    </div>
<?php
   endforeach;
    else :
    endif;
    endif;
?>
        <textarea name="commentaire" id="commentaire" cols="30" rows="10" placeholder="Laissez votre commentaire !"></textarea>
        <input type="submit" value="Commenter">
    </form>
<?php
    endif;
?> 
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
   
?>

 
</section> 
</section>

<?php $content = ob_get_clean(); ?>
<?php require('templates/template.php'); ?>
    