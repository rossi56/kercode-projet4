<?php $title = "Billet simple pour l'Alaska;" ?>
<?php ob_start(); ?>
<h3>Contactez-moi !</h3>
    <h4>Je vous réponds rapidement !</h4>
        <div class="inscription"></div>
            <form method="post" action="roman.php">
                <input class="search" type="text" name="query" placeholder="Recherche.." value="<?php if(isset($_POST[" query
                        "])) echo $_POST["query "]//laisser champs de recherche rempli ?>">
            </form>
        <div class="mail">                  
            <form method="post" action="">
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
            <h2>Votre message a été envoyé !</h2>
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
            <?php if(isset($_POST["texte"])) echo $_POST["texte"] ?>
        </textarea>
        <input type="submit" value="Envoyer">
                </form>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>