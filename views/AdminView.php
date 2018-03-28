<?php
$title = "Administration";
$titleHeader = "";
$video = "public/video/admin.mp4"
?>

<?php ob_start(); ?>


<section class="admin">

 
   
<?php
    if(!empty($reports)) :
?>
        <h3>Les commentaires signalés !</h3>
        <article class="comments">
<?php
    foreach($reports as $report) :
?>

    <ul>
        <li> Membre n° : <?= $report['id_membre'] ?></li>
        <li class='comments'><?= $report['commentaire'] ?> </li>
        <li><a href="admin.php?action=deleteComment&id=<?= $report['id'] ?>">Supprimer le commentaire</a></li>
        <li><a href="admin.php?action=valider&id=<?= $report['id'] ?>">Valider le commentaire</a></li>
    </ul>
<?php

    endforeach;
    endif;
?>
</article>
    
<h3>Les 5 derniers commentaires publiés</h3>
<?php
    foreach($commentaires as $commentaire) :
?>
    <article class="comments">
            <p class="date">Posté par le membre n°: <?= $commentaire["id_membre"] ?> <br> <br> le <time datetime="<?= $commentaire["publication"] ?>" ><?= $commentaire["publication"] ?></time>     
            <p class="comment">"<?= $commentaire["commentaire"] ?>"</p>
            <a href="admin.php?action=admin&id=<?= $commentaire['id'] ?>">Supprimer ce commentaire</a>
    </article>

<?php
    endforeach;
?>

 <h3>Les 5 derniers membres inscrits</h3>
<article class="comments">
   
<?php
    foreach($membres as $membre) :
?>
    <ul>
    <li><img src="public/img/<?= $membre['avatar'] ?>" alt=""></li>
    <li> Membre n°<?= $membre['id'] ?> : <?= $membre['pseudo'] ?></li> 
    <li><a href="admin.php?action=admin&id=<?= $membre['id'] ?>">Supprimer</a></li>
    
    </ul>
<?php

    endforeach;
?>
</article>
</section>




<?php $content = ob_get_clean(); ?>
<?php require('templates/templateAdmin.php'); ?>