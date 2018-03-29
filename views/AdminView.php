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
         <div class="signal">
            <h2>Les commentaires signalés !</h2>
            <i class='fas fa-exclamation-triangle'></i>
         </div>
        
       
        <article class="comments">
<?php
    foreach($reports as $report) :
?>

    <p class='membre'> Membre : <?= $report['pseudo'] ?></p>
    <p class='report'>Commentaire : <?= $report['commentaire'] ?> </p> 
    <div class="gestion">
    <p class="delete"><a href="admin.php?action=deleteComment&id=<?= $report['commentaire'] ?>">Supprimer</a></p> 
    <p class="valide"><a href="admin.php?action=valider&id=<?= $report['commentaire'] ?>">Valider</a>
    </p>
    </div>
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
            <p class="date">Posté par le membre n°<?= $commentaire["id_membre"] ?>:  <?= $commentaire["pseudo"] ?> <br> <br> le <time datetime="<?= $commentaire["publication"] ?>" ><?= $commentaire["publication"] ?></time>     
            <p class="comment">"<?= $commentaire["commentaire"] ?>"</p>
            <a href="admin.php?action=admin&id=<?= $commentaire['commentaire'] ?>">Supprimer ce commentaire</a>
    </article>

<?php
    endforeach;
?>

 <h3>Les 5 derniers membres inscrits</h3>
<article class="comments">
   
<?php
    foreach($membres as $membre) :
?>
    <p><img src="public/img/avatars/<?= $membre['avatar'] ?>" alt=""></p>
    <p class="date"> Membre n°<?= $membre['id'] ?> : <?= $membre['pseudo'] ?></p> 
    <a href="admin.php?action=admin&id=<?= $membre['id'] ?>">Supprimer</a>

<?php

    endforeach;
?>
</article>
</section>




<?php $content = ob_get_clean(); ?>
<?php require('templates/templateAdmin.php'); ?>