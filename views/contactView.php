<?php
$title = "Billet simple pour l'Alaska";
$titleHeader = "Contact";
$video = "public/video/aircraft.mp4";
$image = ''
?>

<?php ob_start(); ?>

    <div class="mail">     
        <h3>Contactez-moi !</h3>
            <h4>Je vous réponds rapidement !</h4>                 
                <form method="post" action="index.php?action=contact">
<?php
    $erreurs = ControllerContact::getErreur() ;
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
    <div class='message erreur'>
        <h2><?= $erreur ?></h2>
            <i class="far fa-check-circle"></i>
    </div>
<?php
    endif;
    endif;
?>
                    <input type="text" name="prenom" placeholder="Votre Prénom *" value="<?php if(isset($_POST[" prenom "])) echo $_POST["prenom
                                        "] ?>">
                    <input type="text" name="nom" placeholder="Votre Nom *" value="<?php if(isset($_POST[" nom "])) echo $_POST["nom "] ?>">
                    <input type="email" name="email" placeholder="Votre e-mail *" value="<?php if(isset($_POST[" email "])) echo $_POST["email
                                        "] ?>">
                    <textarea name="texte" placeholder="Votre message">
<?php
    if(isset($_POST["texte"])) echo $_POST["texte"]
?>
                    </textarea>
                    <input type="submit" value="Envoyer">
                </form>
    </div>

    
<?php $content = ob_get_clean(); ?>
<?php require('templates/template.php'); ?>