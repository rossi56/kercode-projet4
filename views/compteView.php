<?php $title = "Billet simple pour l'Alaska;" ?>
<?php ob_start(); ?>
<h2>Bienvenue "<?= $infos["pseudo"] ?>"</h2>
    <h3>Vos derniers commentaires</h3>
        <img class="avatar" src="img/<?= $infos["avatar"] ?>" alt="Avatar">
            <p class="email">Adresse e-mail : <?= $infos["email"] ?></p>
                <form method="post" action="roman.php">
                    <input class="search" type="text" name="query" placeholder="Recherche.." value="<?php if(isset($_POST["query"])) echo $_POST["query"]//laisser champs de recherche rempli ?>">
                </form>
        <img class="pref-img" src="img/compte.png" alt="Préface">
    <div class="comments">
<?php
    foreach($commentaires as $commentaire) :
?>
    <p class="date">Posté sur l'article "<?= $commentaire["titre"] ?>" le <time datetime="<?= $commentaire["publication"] ?>"><?= formatage_date($commentaire["publication"]) ?></time> :</p>
    <p class="historique"><?= $commentaire["commentaire"] ?></p>
<?php
    endforeach;
?>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>