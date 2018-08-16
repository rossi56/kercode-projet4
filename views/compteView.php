<?php
$title = "Mon profil";
$image = "public/img/header/compte.png";
$video = 'public/video/compte.mp4'
?>
<?php ob_start() ?>
<div class="articles">
    <h3>Profil de "<?= $compte["pseudo"] ?>"</h3>
        <img class="avatar" src="public/img/avatars/<?= $compte["avatar"] ?>" alt="Avatar">
            <p> <span>Votre pseudo :</span> <?= $compte["pseudo"] ?></p>
            <p> <span>Votre adresse e-mail :</span> <?= $compte["email"] ?></p>
            <p><a href="index.php?action=editProfil&id=<?= $_SESSION['membre'] ?>">Editer mon profil</a></p>
</div> 
    <h3>Vos derniers commentaires</h3>     
<?php
    foreach($commentaires as $commentaire) :
?>
<div class="commentaires">

    <p class="date">Posté sur l'article "<?= $commentaire["titre"] ?>" le <time datetime="<?= $commentaire["publication"] ?>"><?= $commentaire["publication"] ?></time> <br> <br><?= $commentaire["commentaire"] ?></p> 
</div>
<?php
    endforeach;
?>

<?php $content = ob_get_clean(); ?>
<?php require('templates/template.php'); ?>