<?php
$title = "Administration";
$titleHeader = "";
$image = "";
$video = "public/video/modif.mp4"
?>
<?php ob_start(); ?>
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
                <h3>Insérer la photo de présentation</h3>
            <input type="file" name="file">
            <!-- <h3>Insérer la photo de l'article</h3>
            <input type="file" name="file2">  -->
            <textarea name="contenu" ><?= $posts["contenu"] ?></textarea>
            <!-- <p class="modif-pres">Insérer la photo de présentation</p>
                <input type="file" name="file">
                <p class="modif-art">Insérer la photo de l'article</p>
                <input type="file" name="file2"> -->
            <input type="submit" value="Modifier">
        </form>
    </section>
    <?php $content = ob_get_clean(); ?>
<?php require('templates/templateAdmin.php'); ?> 
  
