<?php 
$title = "Billet simple pour l'Alaska";
$image = "public/img/header/connexion.png";
$video = "public/video/connexion.mp4" ?>
<?php ob_start() ?>
    <div class="formulaire">
        <h3>Connectez-vous !</h3>
            <form method="post" action="index.php?action=connexion" >
<?php
    $erreurs = ControllerMembres::getErreur();
    if($erreurs) :
?>
<!-- affichage de ce message en cas d'erreur -->
    <div class="message erreur envoi">
        <?= $erreurs[0] ?>
    </div>
<?php
endif;
?>
                <input type="text" name="pseudo" placeholder="Pseudo" value="<?php if(isset($_POST["pseudo"])) echo ($_POST["pseudo"]) ?>">
                <input type="password" name="password" placeholder="Mot de Passe">
                <input class="btn-submit" type="submit" value="Connexion">
            </form>
    </div>

<?php $content = ob_get_clean(); ?>
<?php require('templates/template.php'); ?>