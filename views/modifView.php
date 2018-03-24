<?php
$title = "Administration";
$titleHeader = "Edition des anciens posts";
$image = "../public/img/admin.png"
?>
<?php ob_start(); ?>
        <section class="formulaire">
            <h3><?= $posts["titre"] ?></h3>   
        <form method="post" action="admin.php?action=publication">
    <?php
        if(isset($erreur)) :
        if($erreur) :
    ?>
        <div class="message erreur"><?= $erreur ?></div>
    <?php
        else :
    ?>
         <div class="confirm">Votre article a bien été modifié !</div>
    <?php
        endif;
        endif;
    ?>
            <input type="text" name="titre" placeholder="Titre *" value="<?= $posts["titre"] ?>">
            <img src="<?= $posts["image2"] ?>" alt="">
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
  
