<?php
$title = "Administration";
$titleHeader = "Page d'administration";
$image = "../public/img/admin.png"
?>

<?php ob_start(); ?>


<section class="comments">
    
<h2>Les 5 derniers commentaires publiés</h2>
<?php
    foreach($commentaires as $commentaire) :
?>
    <article class="commentaires">
            <p class="date">Posté par le membre n°: <?= $commentaire["id_membre"] ?> <br> <br> le <time datetime="<?= $commentaire["publication"] ?>" ><?= $commentaire["publication"] ?></time>  </p>    
            <p class="comment">"<?= $commentaire["commentaire"] ?>"</p>
    </article>

<?php
    endforeach;
?>
</section>
<span></span>
<section class="comments">
    <h2>Les 5 derniers membres inscrits</h2>
<?php
    foreach($membres as $membre) :
?>
    <ul>
    <li><img src="public/img/<?= $membre['avatar'] ?>" alt=""></li>
    <li> Membre n°<?= $membre['id'] ?> : <?= $membre['pseudo'] ?></li> 
    <li><a href="admin.php?action=admin">Supprimer</a></li>
    
    </ul>
<?php

    endforeach;
?>
</section>





<?php $content = ob_get_clean(); ?>
<?php require('templates/templateAdmin.php'); ?>