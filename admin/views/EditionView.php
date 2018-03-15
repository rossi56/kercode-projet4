<?php
$title = "Modification";
$image = "../public/img/admin.png"
?>
<?php ob_start(); ?>
        <div class="admin posts">
            <h2 class="titre-admin"><?= $post["titre"] ?></h2>   
        <form method="post" action="">
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
            <input type="text" name="titre" placeholder="Titre *" value="<?= $post["titre"] ?>">
            <!-- remplacement balises br strreplace -->
            <textarea name="contenu" placeholder="Corps de l'article *"><?=str_replace("<br />", "", $post["contenu"]) ?></textarea>
            <!-- <p class="modif-pres">Insérer la photo de présentation</p>
                <input type="file" name="file">
                <p class="modif-art">Insérer la photo de l'article</p>
                <input type="file" name="file2"> -->
            <input type="submit" value="Modifier">
        </form>
    </div>
<?php $content = ob_get_clean(); ?>
<?php require('templateAdmin.php'); ?>