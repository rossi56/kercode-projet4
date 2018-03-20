<?php
$title = "Inscription";
$image = "public/img/book.png"
?>
<?php ob_start(); ?>

    <div class="inscription">
    <h3>Inscrivez-vous !</h3>
                    <h4>Ne rater pas les derniers articles !</h4>
    
        <form method="post" action="index.php?action=inscription">
<?php
    if(isset($erreurs)) :
    if($erreurs) :
// BOUCLE POUR L'AFFICHAGE DES MESSAGES D'ERREURS
    foreach($erreurs as $erreur)  :   
?>
<!-- affichage de ce message en cas d'erreur -->
    <div class="message erreur">
        <?= $erreur ?>
    </div>
<?php
    endforeach;
    else :
?>
<!-- affichage de ce message s'il n'y a pas d'erreur -->
    <div id="envoi">
        <h2>Votre inscription a bien été prise en compte !</h2>
            <i class="far fa-check-circle"></i>
    </div>
<?php
    endif;
    endif;
?>
            <input type="text" name="pseudo" placeholder="Pseudo *" value="<?php if(isset($_POST[" pseudo "])) echo ($_POST["pseudo
                                "]) ?>">
            <input type="text" name="email" placeholder="Votre e-mail *" value="<?php if(isset($_POST[" email "])) echo ($_POST["email
                                "]) ?>">
            <input type="email" name="emailconf" placeholder="Confirmez votre e-mail *" value="<?php if(isset($_POST[" emailconf
                                "])) echo ($_POST["emailconf "]) ?>">
            <input type="password" name="password" placeholder="Mot de Passe *">
            <input type="password" name="passwordconf" placeholder="Vérification du mot de passe *">
            <input class="btn-submit" type="submit" value="S'inscrire">
        </form>
<?php $content = ob_get_clean(); ?>
<?php require('templates/template.php'); ?>