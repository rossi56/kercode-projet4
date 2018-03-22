<?php
$title = "Mon profil";
$titleHeader = "Bienvenue";
$image = 'public/img/compte.png'
?>
<?php
 ob_start();
?>

<div class="articles">
    <h3>Profil de "<?= $compte["pseudo"] ?>"</h3>
        <img class="avatar" src="public/img/<?= $compte["avatar"] ?>" alt="Avatar">
            <p>Votre pseudo : <?= $compte["pseudo"] ?></p>
            <p>Votre adresse e-mail : <?= $compte["email"] ?></p>
            <p><a href="index.php?action=editProfil">Editer mon profil</a></p>
</div> 
         
<?php
    foreach($commentaires as $commentaire) :
?>
<div class="comments">
<h3>Vos derniers commentaires</h3>
    <p class="date">Posté sur l'article "<?= $commentaire["titre"] ?>" le <time datetime="<?= $commentaire["publication"] ?>"><?= $commentaire["publication"] ?></time> :</p>
    <p class="historique"><?= $commentaire["commentaire"] ?></p> 
</div>
<?php
    endforeach;
?>

<?php $content = ob_get_clean(); ?>
<?php require('templates/template.php'); ?>