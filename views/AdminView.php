<?php
$title = "Administration";
$titleHeader = "";
$video = "public/video/admin.mp4"
?>

<?php ob_start(); ?>


<section class="admin">

 
   
<?php
  if($reports)  :
      
?>
    <h3>Jean Forteroche</h3>
        <img class='avatar' src="public/img/avatars/forteroche.png" alt="Jean Forteroche">
        <div class="signal">
            <i class='fas fa-exclamation-triangle'></i>
            <h2>Commentaires à modérer !</h2>
            
        </div>  
        
<?php
    endif;
?>
        <article class="comments">
<?php
    foreach($reports as $report) :
?>
 
    <p class='membre'> <span> Membre : </span><?= $report['pseudo'] ?></p>
    <p class='report'><span> Commentaire : </span><?= $report['commentaire'] ?> </p> 
    <div class="gestion">
    <p class="delete"><a href="admin.php?action=deleteComment&id=<?= $report['id'] ?>">Supprimer</a></p> 
    <p class="valide"><a href="admin.php?action=valider&id=<?= $report['id'] ?>">Valider</a>
    </p>
    </div>
<?php

    endforeach;

?>
</article>
    
<h3>Les 5 derniers commentaires publiés</h3>
<?php
    foreach($commentaires as $commentaire) :
?>
    <article class="comments">
            <p class="date"> <span> Posté par le membre n°<?= $commentaire["id_membre"] ?> :</span>  <?= $commentaire["pseudo"] ?> <br> <br> le <time datetime="<?= $commentaire["publication"] ?>" ><?= $commentaire["publication"] ?></time>     
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
    <p><img class='avatar' src="public/img/avatars/<?= $membre['avatar'] ?>" alt=""></p>
    <p class="date"><span> Membre n°<?= $commentaire["id_membre"] ?> :</span>  <?= $membre['pseudo'] ?></p> 
    <a href="admin.php?action=admin&id=<?= $membre['id'] ?>">Supprimer</a>

<?php

    endforeach;
?>
</article>
</section>




<?php $content = ob_get_clean(); ?>
<?php require('templates/templateAdmin.php'); ?>