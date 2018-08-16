<?php
$title = "Administration";
$image = "public/img/header/new.png";
$video = 'public/video/new.mp4'
?>
<?php ob_start() ?>
    <div class="admin">
        <h3>"Publication du chapitre"</h3>
    <form class='formulaire' method="post" action="" enctype="multipart/form-data">
<?php
    $erreurs = ControllerAdmin::getErreur();
    if(isset($erreurs)) :
    if($erreurs) :
    foreach($erreurs as $erreur) :
?>
    <div class="message erreur envoi">
        <?= $erreur ?>
    </div>
<?php
    endforeach;
    else :
?>
<?php
    endif;
    endif;
?>
        <input type="text" name="titre" placeholder="Titre de l'article *" value="<?php if(isset($_POST[" titre "])) echo $_POST["titre "] ?>">
            <label>Insérer la photo de présentation</label>
        <input type="file" name="file">
            <label>Insérer la photo de l'article</label>
        <input type="file" name="file2"> 
        <textarea class="publication" name="contenu" placeholder="Corps de l'article *"><?php if(isset($_POST["contenu"])) echo $_POST["contenu"] ?>
        </textarea>
        <input type="submit" value="Publier">
    </form>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require('templates/templateAdmin.php'); ?>