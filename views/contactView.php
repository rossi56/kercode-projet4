<?php
$title = "Billet simple pour l'Alaska";
$video = "public/video/contact.mp4";
$image = 'public/img/header/contact.png' ?>
<?php ob_start() ?>
    <div class="formulaire">     
        <h3>Contactez-moi ! <br> Je vous réponds rapidement  !</h3>             
                <form method="post" action="index.php?action=contact">
<?php
    $erreurs = ControllerContact::getErreur() ;
    if(isset($erreurs)) :
    if($erreurs) :
// BOUCLE POUR L'AFFICHAGE DES MESSAGES D'ERREURS
    foreach($erreurs as $erreur)  :   
?>
<!-- affichage de ce message en cas d'erreur -->
    <div class="message erreur envoi">
        <?= $erreur ?>
    </div>
<?php
    endforeach;
    else :
    endif;
    endif;
?>
                    <input type="text" name="prenom" placeholder="Votre Prénom *" value="<?php if(isset($_POST[" prenom "])) echo $_POST["prenom
                                        "] ?>">
                    <input type="text" name="nom" placeholder="Votre Nom *" value="<?php if(isset($_POST[" nom "])) echo $_POST["nom "] ?>">
                    <input type="email" name="email" placeholder="Votre e-mail *" value="<?php if(isset($_POST[" email "])) echo $_POST["email
                                        "] ?>">
                    <label for="texte">Sujet du message</label>
                    <textarea name="texte" >
<?php
    if(isset($_POST["texte"])) echo $_POST["texte"]
?>
                    </textarea>
                    <input class='btn-submit' type="submit" value="Envoyer" >
                </form>
    </div>

    
<?php $content = ob_get_clean(); ?>
<?php require('templates/template.php'); ?>