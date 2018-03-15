<?php
$title = "Billet simple pour l'Alaska";
$image = 'public/img/compte.png'
?>
<?php
 ob_start();
?>
<h2>Bienvenue "<?= $compte["pseudo"] ?>"</h2>
    <h3>Vos derniers commentaires</h3>
        <img class="avatar" src="public/img/<?= $compte["avatar"] ?>" alt="Avatar">
            <p class="email">Adresse e-mail : <?= $compte["email"] ?></p>
    <div class="comments">
<?php
    foreach($commentaires as $commentaire) :
?>
    <p class="date">Posté sur l'article "<?= $commentaire["titre"] ?>" le <time datetime="<?= $commentaire["publication"] ?>"><?= $commentaire["publication"] ?></time> :</p>
    <p class="historique"><?= $commentaire["commentaire"] ?></p>
<?php
    endforeach;
?>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>