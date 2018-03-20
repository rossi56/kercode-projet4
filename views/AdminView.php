<?php
$title = "Administration";
$titleHeader = "Page d'administration";
$image = "../public/img/admin.png"
?>
<?php ob_start(); ?>
    <div class="admin">
            <p class="admin-post">"Publier un article"</p>
            <form method="post" action="" enctype="multipart/form-data">
        <?php
            if(isset($erreurs)) :
            if($erreurs) :
            foreach($erreurs as $erreur) :
        ?>
        <div class="message erreur">
        <?= $erreur ?>
        </div>
        <?php
            endforeach;
            else :
        ?>
        <div class="confirm">Votre article a bien été publié !</div>
        <?php
            endif;
            endif;
        ?>
                <input type="text" name="titre" placeholder="Titre de l'article *" value="<?php if(isset($_POST[" titre "])) echo $_POST["titre "] ?>">
                <p class="insert-pres">Insérer la photo de présentation</p>
                <input type="file" name="file">
                <p class="insert-art">Insérer la photo de l'article</p>
                <input type="file" name="file2">
                <textarea class="publication" name="contenu" placeholder="Corps de l'article *"><?php if(isset($_POST["contenu"])) echo $_POST["contenu"] ?>
                </textarea>
                <input type="submit" value="Publier !">
            </form>

        </div>
<?php $content = ob_get_clean(); ?>
<?php require('templates/templateAdmin.php'); ?>