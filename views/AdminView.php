<?php
$title = "Administration";
$titleHeader = "Page d'administration";
$image = "public/img/admin.png"
?>

<?php ob_start(); ?>


<section class="admin">
    
<h3>Les 5 derniers commentaires publiés</h3>
<?php
    foreach($commentaires as $commentaire) :
?>
    <article class="comments">
            <p class="date">Posté par le membre n°: <?= $commentaire["id_membre"] ?> <br> <br> le <time datetime="<?= $commentaire["publication"] ?>" ><?= $commentaire["publication"] ?></time>     
            <p class="comment">"<?= $commentaire["commentaire"] ?>"</p>
            <li><a href="admin.php?action=admin&id=<?= $commentaire['id'] ?>">Supprimer ce commentaire</a></li>
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