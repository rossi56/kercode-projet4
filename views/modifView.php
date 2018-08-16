<?php
$title = "Administration";
$image = "public/img/header/modif.png";
$video = "public/video/modif.mp4"
?>
<?php ob_start() ?>
        <section class="formulaire">
            <h3><?= $posts["titre"] ?></h3>   
        <form method="post" action="admin.php?action=modifier&id=<?= $posts["id"] ?>">
    <?php
       $erreurs = ControllerAdmin::getErreur() ;
        if(isset($erreur)) :
        if($erreur) :
    ?>
        <div class="message erreur envoi"><?= $erreur ?></div>
 
    <?php
        endif;
        endif;
    ?>
            <input type="text" name="titre" placeholder="Titre *" value="<?= $posts["titre"] ?>">
              
            <textarea name="contenu" ><?= $posts["contenu"] ?></textarea>
           
            <input type="submit" value="Modifier">
        </form>
    </section>
    <?php $content = ob_get_clean(); ?>
<?php require('templates/templateAdmin.php'); ?> 
  
